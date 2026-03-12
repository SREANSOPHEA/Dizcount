<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\shops;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{

    function login(){
        return view('admin.login');
    }

    function logout(){
        Session::forget('userID');
        return redirect('/admin/login');
    }

    function loginSubmit(Request $request){
        $username = $request->username;
        $password = $request->password;

        $check = users::where([
            'username' => $username,
            'password' => $password
        ])->first();

        if(empty($check)) return back()->with('error',' ');

        Session::put('userID',$check['id']);
        return redirect('admin/');


    }

    function dashboard(){
        $totalShop = shops::all()->count();
        $totalAdmin = users::where('role','admin')->count();

        return view("admin.dashboard");
    }

    function viewAdmin(){
        $items = users::all();
        // return $items;
        return view("admin.viewAdmin",['items'=>$items]);
    }

    function addAdmin(){

        return view("admin.addAdmin");
    }

    function addAdminSubmit(Request $request){
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $telegram = $request->telegram;
        $password = $request->password;
        users::create([
            'username'=>$name,
            'email'   =>$email,
            'phone'   =>$phone,
            'telegram'=>$telegram,
            'password'=>$password,
            'role'    =>"admin"
        ]);
        return redirect('/admin/viewAdmin');
    }

    function deleteAdmin(Request $request){
        $user = users::find($request->id);
        $user->delete();
        return redirect('/admin/viewAdmin');
    }

    function editAdmin($id){
        $data = users::find($id);
        return view('admin.editAdmin',['data'=>$data]);
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
