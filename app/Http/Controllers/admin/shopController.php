<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class shopController extends Controller
{
    function viewShop(){
        $items = shops::all();
        return view("admin.viewShop",['items'=>$items]);
    }

    function viewShopDetail($id){
        $shop = shops::find($id);
        return view("admin.viewShopDetail",['data'=>$shop]);
    }

    function addShop(){
        return view("admin.addShop");
    }

    function addShopSubmit(Request $request){
        $file = $request->file('image');
        if (empty($file)){
            $image = "img-icon.png";
        }else{
            $image = $this->uploadImage($file);
        }

        shops::create([
            'name'     => $request->name,
            'location' => $request->location,
            'logo_url' => $image,
            'telegram' => $request->telegram,
            'phone'    => $request->phone,
            'created_by'=> Session('userID')
        ]);
        return redirect('admin/viewShop');
    }

    function editShop($id){
        $data = shops::find($id);
        return view('admin.editShop',['data'=>$data]);
    }

    function editShopSubmit(Request $request,$id){
        $shop = shops::find($id);
        $shop->name = $request->name;
        $shop->location = $request->location;
        $shop->phone = $request->phone;
        $shop->telegram = $request->telegram;

        $file = $request->file('image');
        if (empty($file)){
            $image = $request->old_image;
        }else{
            $image = $this->uploadImage($file);
        }

        $shop->logo_url = $image;
        $shop->save();
        return redirect('admin/viewShop');
    }
}
