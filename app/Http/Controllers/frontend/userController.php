<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\posts;
use App\Models\shops;
use App\Models\social_media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{

    function home(){
        $shops = shops::all();

        $posts = posts::with(['shop','discount_percentage','discount_free'])
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->latest()
                ->get();
        return view('user.home',['posts'=>$posts,'shops'=>$shops]);
    }

    function about(){
        return view('user.about');
    }

    function contact(){
        return view('user.contact');
    }

    function sendEmail(Request $request){
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        try {
            Mail::raw(
                "Name: {$request->name}\nEmail: {$request->email}\nMessage: {$request->message}",
                function ($mail) use ($request) {
                    $mail->to('sreansophea2105@gmail.com')
                        ->from($request->email, $request->name)
                        ->subject('New Contact Form Message');
                }
            );

            return back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message. Please try again.');
        }
    }

    function viewPost($id){
        $data = posts::with(['shop','discount_free','discount_percentage'])->find($id);
        $socials = social_media::where('shop_id',$id)->get();
        // return $socials;
        // return $socials;
        return view("user.viewPost",['data'=>$data,'socials'=>$socials]);
    }
}
