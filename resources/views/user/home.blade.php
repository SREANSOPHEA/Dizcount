@extends('user.userMasterPage')

@section('content')

<style>
.card-food-btn{
    background-color: #f5c518;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 20px;
    transition: all 0.3s;
}
a{
    color: black;
}
.card-food-btn:hover{
    transform: scale(1.1);
}
.rice{
    position: relative;
    animation: rice infinite 2s;
}
@keyframes rice{
    0%{
        transform: translateY(0);
    }
    50%{
        transform: translateY(50px);
    }
    100%{
        transform: translateY(0);
    }
}
</style>

<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>@lang('message.food')</h2>
        </div>

        @if (count($posts) ==0)
            <div class="w-100 card mt-4 bg-dark rounded text-light pb-4">
                <center>
                    <img class="img-fluid rice" src="{{asset('assets1/images/rice.png')}}" alt="food">
                </center>
                <h1 class="text-center"><b>No discounts here… yet</b></h1>
                <h4 class="text-center mb-4">Vendors haven't posted any food deals right now. Be the first to know when a great offer drops!</h4>
            </div>
        @else
        <div class="filters-content">
            <div class="row grid">


                @foreach ($posts as $data)
                    <div class="col-sm-6 col-lg-4 all {{$data->shop_id}}">
                        <div class="box">
                           <div>
                                @php
                                $total = floatval($data->price) * intval($data->purchase_quantity);
                                $discount = $data->discount_percentage->discount;
                                $finalPrice = $total - ($total * $discount / 100);
                                @endphp

                                <a href="/viewPost/{{$data->id}}" style="color:white">
                                    <div class="img-box position-relative">
                                        @if($data->discount_type == 'percentage')
                                            <div class="position-absolute p-3 bg-danger text-center" style="top:10px;right:-60px;transform:rotate(45deg);width:200px">{{$discount}}% OFF</div>
                                        @else
                                            <div class="position-absolute p-3 bg-danger text-center"style="top:0px;right:-60px;transform:rotate(45deg);width:200px">
                                                Buy {{$data->purchase_quantity}} <br>
                                                Get {{$data->discount_free->free_quantity}} Free
                                            </div>
                                        @endif
                                        <img src="{{asset('assets/img/'.$data->purchase_img)}}" alt="">
                                    </div>

                                    <div class="detail-box">
                                        <h5>{{$data->purchase_item}}</h5>
                                        <span>{{ \Carbon\Carbon::parse($data->end_date)->format('d-M-Y') }}</span>
                                     </a>

                                <div class="options">
                                    <div>
                                        @if($data->discount_type == 'percentage')
                                            <h2 style="color:#f5c518"><b>{{$data->currency == "dollar"?'$':'៛'}}{{ number_format($finalPrice, $data->currency=='dollar'?'2':'0') }}</b></h2>
                                        @else
                                            <h2 style="color:#f5c518"><b>{{$data->currency == "dollar"?'$':'៛'}}{{ number_format($data->price, $data->currency=='dollar'?'2':'0') }}</b></h2>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        <a href="https://www.google.com/maps/dir/?api=1&destination={{$data->shop->location}}" target="_blank" class="card-food-btn m-1"><i class="bi bi-geo-alt-fill"></i></a>
                                        <a href="tel:{{$data->shop->phone}}" class="card-food-btn m-1"><i class="bi bi-telephone-fill"></i></a>
                                        <a href="{{$data->shop->telegram}}" class="card-food-btn m-1"><i class="bi bi-chat-dots-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection