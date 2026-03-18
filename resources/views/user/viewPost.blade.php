@extends('user.userMasterPage')

@section('content')
<style>
.card-food-btn{
    background-color: #f5c518;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s;
}
a{
    color: black;
}
.card-food-btn:hover{
    transform: scale(1.1);
}
.socialIconWraper{
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 10px;
}
.facebook{
    background-color: blue;
}
.tiktok{
    background-color: black;
}
.instagram{
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
}
.socialIconWraper i{
    color: white;
    font-size: 20px;

}
img{
    filter: drop-shadow(8px 8px 10px gray);
}
</style>
<div class="container p-4">
    <div class="p-3 row card bg-dark text-light">
        <div class="col-12">
            <div class="row header">
                @if ($data->discount_type == "percentage")
                    <div class="col-6 text-start"><h2><b>(%) Discount Deal</b></h2></div>
                    <div class="col-6 d-flex justify-content-end align-items-center"><span class="p-3" style="background-color: #f5c518;border-radius: 10px"><b>{{$data->discount_percentage->discount}}% OFF</b></span></div>
                @else
                    <div class="col-6 text-start"><h2><b>Free Item Deal</b></h2></div>
                    <div class="col-6 d-flex justify-content-end align-items-center"><label class="p-2" style="background-color: #f5c518;border-radius: 20px"><b>Buy {{$data->purchase_quantity}} Get {{$data->discount_free->free_quantity}}</b></label></div>
                @endif
            </div>
            <div class="row discount-info mt-3">
                <div class="col-12 col-lg-5">
                    <div class="position-relative">
                        <div class="position-absolute">
                            <span class="badge rounded-pill bg-danger p-2">
                                (x {{$data->purchase_quantity}})
                            </span>
                        </div>
                        <center><img src="{{asset('assets/img/'.$data->purchase_img)}}" class="rounded" style="height: 270px" alt="Purchase Image"></center>
                    </div>
                    @if ($data->discount_type == "free_item")
                        <div style="width: max-content; padding:3px 7px;margin:20px auto;" class="bg-success rounded"><h1><b>Free</b></h1></div>
                        <div class="position-relative">
                            <center><img src="{{asset('assets/img/'.$data->discount_free->free_img)}}" class="rounded" style="height: 270px" alt="Purchase Image"></center>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-lg-7 p-2 align-middle">
                    <h2><b>{{$data->shop->name}}</b></h2>
                    <h3 >{{$data->purchase_item}} {{$data->title?'- '.$data->title:''}}</h3>
                    <p style="text-align: justify">{{$data->description}}</p>

                    @if ($data->discount_type == "free_item")
                        <div class="d-flex">
                            <div style="width: max-content; padding:3px 7px;" class="bg-success rounded"><h3><b>Free</b></h3></div>
                            <div class="ml-3"><h3 class="text-success">{{$data->discount_free->free_item}}</h3></div>
                        </div>
                        <div>
                            <i class="bi bi-cart4"></i> Buy {{$data->purchase_quantity}} {{$data->purchase_item}} to Get {{$data->discount_free->free_quantity}} {{$data->discount_free->free_item}} for Free
                        </div>
                    @endif

                    <div class="d-flex align-items-end">
                        @php
                            if($data->discount_type == 'percentage'){
                                $total = floatval($data->price) * intval($data->purchase_quantity);
                                $discount = $data->discount_percentage->discount;
                                $finalPrice = $total - ($total * $discount / 100);
                            }else{
                                $finalPrice = $data->price * $data->purchase_quantity;
                            }
                        @endphp
                        <div>
                            <h1><b>{{$data->currency=='dollar'?'$':'៛'}}{{number_format($finalPrice,$data->currency == 'dollar'?'2':'0' )}}</b></h1>
                        </div>
                        @if ($data->discount_type == 'percentage')
                        <div class="ml-3">
                            <h3><s>{{$data->currency=='dollar'?'$':'៛'}}{{number_format($total,$data->currency == 'dollar'?'2':'0' )}}</s></h3>
                        </div>
                        @endif
                    </div>
                    <hr style="width:100%; height:1px; background:white; border:none; border-top:1px dashed white;">
                    <span>Date: <b>{{ \Carbon\Carbon::parse($data->start_date)->format('d-M-Y') }}</b></span><br>
                    <span>Expire: <b>{{ \Carbon\Carbon::parse($data->end_date)->format('d-M-Y') }}</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom p-3 row" style="background-color: rgb(213, 213, 213)">
        <div class="col-12 col-md-6 text-start d-flex">
            <a href="https://www.google.com/maps/dir/?api=1&destination={{$data->shop->location}}" target="_blank" class="card-food-btn m-1"><i class="bi bi-geo-alt-fill"></i></a>
            <a href="tel:{{$data->shop->phone}}" class="card-food-btn m-1"><i class="bi bi-telephone-fill"></i></a>
            <a href="{{$data->shop->telegram}}" class="card-food-btn m-1"><i class="bi bi-chat-dots-fill"></i></a>
        </div>
        @if ($socials)
            <div class="col-12 col-md-6 text-end">
                <div class="d-flex justify-content-end">
                    <div class="socialIconWraper facebook">
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="socialIconWraper tiktok">
                        <a href=""><i class="bi bi-tiktok"></i></a>
                    </div>
                    <div class="socialIconWraper instagram">
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                @foreach ($socials as $media)
                    <a href="{{$media->url}}">{{$media->platform}}</a>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection