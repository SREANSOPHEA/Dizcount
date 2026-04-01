<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\posts;
use App\Models\shops;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class adminController extends Controller
{

    function login(){
        return view('admin.login');
    }

    function logout(){
        Auth::guard('web')->logout();
        Session::flush();
        return redirect('/admin/login');
    }

    function loginSubmit(Request $request){
        $username = $request->username;
        $password = $request->password;
        $user = users::where('username', $username)->first();

        // Check if user exists AND password matches
        if ($user && Hash::check($password, $user->password)) {
            if (!in_array($user->role, ['admin', 'superAdmin'])) {
                return back()->with('error', 'You do not have admin privileges');
            }
            Auth::guard('web')->login($user);
            Session::put('userID', $user->id);
            Session::put('user_role', $user->role);
            Session::put('username', $user->username);

            return redirect('/admin')->with('success', 'Welcome back!');
        }

        // If login fails
        return back()->with('error', 'Invalid username or password');

    }

    function dashboard(){
        $now = Carbon::now();
        $totalShop = shops::all()->count();
        $totalAdmin = users::where('role','admin')->count();
        $totalPost = posts::all()->count();
        $pendingPost = posts::where('start_date', '>', $now)->count();
        $activePost = posts::where('start_date', '<=', $now)
                        ->where('end_date', '>=', $now)
                        ->count();
        $expirePost = posts::where('end_date', '<', $now)->count();

        $recentPost = posts::with(['shop','admin'])->latest()->take(3)->get();

        return view("admin.dashboard",['shop'=>$totalShop,'post'=>$totalPost,'admin'=>$totalAdmin,'active'=>$activePost,'expire'=>$expirePost,'pending'=>$pendingPost,'recentPost'=>$recentPost]);
    }

    function viewAdmin(){
        $items = users::all();
        return view("admin.admins.viewAdmin",['items'=>$items]);
    }

    function addAdmin(){
        return view("admin.admins.addAdmin");
    }

    function addAdminSubmit(Request $request){
        $user = users::create([
            'username'=>$request->name,
            'email'   =>$request->email,
            'phone'   =>$request->phone,
            'telegram'=>$request->telegram,
            'password'=>Hash::make($request->password),
            'role'    =>"admin"
        ]);

        Auth::login($user);
        return redirect('/admin/viewAdmin')->with('success', 'Admin created successfully!');
    }

    function deleteAdmin(Request $request){
        $user = users::find($request->id);
        $user->delete();
        return redirect('/admin/viewAdmin');
    }

    function editAdmin($id){
        $data = users::find($id);
        return view('admin.admins.editAdmin',['data'=>$data]);
    }

    function editAdminSubmit(Request $request,$id){
        $user = users::find($id);
        $user->username = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->telegram = $request->telegram;
        $user->password = $request->password;
        $user->save();

        return redirect('/admin/viewAdmin');
    }



}
