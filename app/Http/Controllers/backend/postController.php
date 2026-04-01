<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\post_detail_frees;
use App\Models\post_detail_percentages;
use App\Models\posts;
use App\Models\shops;
use Illuminate\Http\Request;

class postController extends Controller
{
    function viewPost(){
        $shops = shops::all();
        $posts = posts::with(['shop','admin','discount_percentage','discount_free'])->latest()->paginate(10);
        // return $posts;
        return view("admin.discountPosts.viewPost",['shops'=>$shops,'posts'=>$posts]);
    }

    function viewPercentageDiscount($id){
        $post = posts::with(['shop','discount_percentage'])->find($id);
        // return $post;
        return view("admin.discountPosts.viewPercentageDiscount",['data'=>$post]);
    }

    function viewFreeDiscount($id){
        $post = posts::with(['shop','discount_free'])->find($id);
        // return $post;
        return view("admin.discountPosts.viewFreeItemDiscount",['data'=>$post]);
    }

    function uploadPost(){
        $shops = shops::all();
        return view("admin.discountPosts.uploadPost",['shops'=>$shops]);
    }

    function uploadPostDiscount(Request $request){

        $file = $request->file('image');
        if(empty($file)){
           $image = 'img-icon.png';
        }else{
            $image = $this->uploadImage($file);
        }


        posts::create([
            'created_by'=>Session('userID'),
            'shop_id' => $request->shop,
            'purchase_item' => $request->name,
            'purchase_quantity' => $request->qty,
            'price' => $request->price,
            'currency'=> $request->currency,
            'title' => $request->title,
            'description' => $request->description,
            'purchase_img' => $image,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'discount_type' => "percentage"
        ]);

        $postID = posts::orderBy('id', 'desc')->first();

        post_detail_percentages::create([
            'post_id'  => $postID['id'],
            'discount' => $request->discount
        ]);

        post_detail_frees::create([
            'post_id'  => $postID['id'],
            'free_item' => "",
            'free_quantity' => 0,
            'free_img' => "img-icon.png"
        ]);
        return redirect('admin/viewPost');
    }

    function uploadPostFree(Request $request){
        $file = $request->file('image');
        if(empty($file)){
           $image = 'img-icon.png';
        }else{
            $image = $this->uploadImage($file);
        }

        $file_free = $request->file('image_free');

        if(empty($file_free)){
           $image_free = 'img-icon.png';
        }else{
            $image_free = $this->uploadImage($file_free);
        }

        posts::create([
            'created_by'=>Session('userID'),
            'shop_id' => $request->shop,
            'purchase_item' => $request->name,
            'purchase_quantity' => $request->qty,
            'price' => $request->price,
            'currency'=> $request->currency,
            'title' => $request->title,
            'description' => $request->description,
            'purchase_img' => $image,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'discount_type' => "free_item"
        ]);

        $postID = posts::orderBy('id', 'desc')->first();

        post_detail_frees::create([
            'post_id'  => $postID['id'],
            'free_item' => $request->name_free,
            'free_quantity' => $request->qty_free,
            'free_img' => $image_free
        ]);

        post_detail_percentages::create([
            'post_id'  => $postID['id'],
            'discount' => "0"
        ]);

        return redirect('admin/viewPost');
    }

    function editDiscountPost($id){
        $shops = shops::all();
        if (posts::find($id)->discount_type == "percentage"){
            $post = posts::with('shop','discount_percentage')->find($id);
            return view('admin.discountPosts.editPercentagePost',['shops'=>$shops,'data'=>$post]);
        } else {
            $post = posts::with('shop','discount_free')->find($id);
            // return $post;
            return view('admin.discountPosts.editFreePost',['shops'=>$shops,'data'=>$post]);
        }
        return $post;
    }


    function editDiscountPercentagePost($id,Request $request){
        $post = posts::find($id);
        $post->shop_id = $request->shop;
        $post->purchase_item = $request->name;
        $post->purchase_quantity = $request->qty;
        $post->price = $request->price;
        $post->currency = $request->currency;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->start_date = $request->start;
        $post->end_date = $request->end;

        $file = $request->file('image');
        if (empty($file)){
            $delete = $request->isDelete;
            if ($delete == "on"){
                $image = "img-icon.png";
            }else{
                $image = $request->old_image;
            }
        }else{
            $image = $this->uploadImage($file);
        }

        $post->purchase_img = $image;
        $post->save();

        $discountDetail = post_detail_percentages::where('post_id',$id)->first();
        $discountDetail->discount = $request->discount;
        $discountDetail->save();
        return redirect('admin/viewPost');
    }

    function editDiscountFreePost($id,Request $request){
        $post = posts::find($id);
        $post->shop_id = $request->shop;
        $post->purchase_item = $request->name;
        $post->purchase_quantity = $request->qty;
        $post->price = $request->price;
        $post->currency = $request->currency;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->start_date = $request->start;
        $post->end_date = $request->end;

        $file = $request->file('image');
        if (empty($file)){
            $delete = $request->isDeletePurchase;
            if ($delete == "on"){
                $image_purchase = "img-icon.png";
            }else{
                $image_purchase = $request->old_image_purchase;
            }
        }else{
            $image_purchase = $this->uploadImage($file);
        }

        $file_free = $request->file('image_free');
        if (empty($file_free)){
            $delete = $request->isDeleteFree;
            if ($delete == "on"){
                $image_free = "img-icon.png";
            }else{
                $image_free = $request->old_image_free;
            }
        }else{
            $image_free = $this->uploadImage($file_free);
        }

        $post->purchase_img = $image_purchase;
        $post->save();

        $discountDetail = post_detail_frees::where('post_id',$id)->first();
        $discountDetail->free_item = $request->name_free;
        $discountDetail->free_quantity = $request->qty_free;
        $discountDetail->free_img = $image_free;
        $discountDetail->save();
        return redirect('admin/viewPost');
    }



    function deleteDiscountPost(Request $request){
        posts::find($request->id)->delete();
        post_detail_frees::where('post_id',$request->id)->delete();
        post_detail_percentages::where('post_id',$request->id)->delete();
        return redirect('admin/viewPost');
    }


}
