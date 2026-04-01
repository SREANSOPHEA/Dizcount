<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\shops;
use App\Models\social_media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class shopController extends Controller
{
    function viewShop(){
        $items = shops::all();
        return view("admin.shops.viewShop",['items'=>$items]);
    }

    function viewShopDetail($id){
        $shop = shops::find($id);
        $media = social_media::where('shop_id',$id)->get();

        return view("admin.shops.viewShopDetail",['data'=>$shop,'media'=>$media]);
    }

    function addShop(){
        return view("admin.shops.addShop");
    }

    function addShopSubmit(Request $request){
        $file = $request->file('image');
        if (empty($file)){
            $image = "img-icon.png";
        }else{
            $image = $this->uploadImage($file);
        }
        $coordinate = $request->location;
        $location = str_replace(" ",'',$coordinate);
        shops::create([
            'name'     => $request->name,
            'location' => $location,
            'logo_url' => $image,
            'telegram' => $request->telegram,
            'phone'    => $request->phone,
            'created_by'=> Session('userID')
        ]);
        return redirect('admin/viewShop');
    }

    function editShop($id){
        $data = shops::find($id);
        return view('admin.shops.editShop',['data'=>$data]);
    }

    function editShopSubmit(Request $request,$id){
        $shop = shops::find($id);
        $shop->name = $request->name;
        $shop->location = $request->location;
        $shop->phone = $request->phone;
        $shop->telegram = $request->telegram;

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

        $shop->logo_url = $image;
        $shop->save();
        return redirect('admin/viewShop');
    }

    function deleteShop(Request $request){
        shops::find($request->id)->delete();
        return redirect('admin/viewShop');
    }

    function addShopSocial(Request $request){
        social_media::create([
            'shop_id' => $request->id,
            'platform'=> $request->platform,
            'url'     => $request->link
        ]);
        return redirect('admin/viewShop');
    }
}
