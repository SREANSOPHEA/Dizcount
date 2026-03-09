@extends('user.userMasterPage')

@section('content')

<style>
    .card-food-btn{
        background-color: yellow;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 20px;
        transition: all 0.3s;
    }
    .card-food-btn:hover{
        transform: scale(1.1);
    }

</style>

    <section class="mt-4 p-3">
        <div class="row">
            <div class="col-12 col-lg-6">
                <center>
                    <img src="{{asset('assets1/images/f1.png')}}" class="img-fluid" alt="">
                </center>
            </div>
            <div class="col-12 col-lg-6">
                <h1>MaMa Fried Rice</h1>
                <h2>បាយឆាម៉ាម៉ា</h2>
                <h4>$3</h4>
                <h6><s style="text-decoration-color:red ">$5</s></h6>
                <p>Date: {{date('d-M-Y')}}</p>
                <p>Expire Date: {{date('d-M-Y')}}</p>
                <div >
                    <button class="card-food-btn" onclick="getDirections('House 8 ផ្លូវលេខ, ៥៤៨ 12151')"><i class="bi bi-geo-alt-fill"></i></button>
                    <button class="card-food-btn"><i class="bi bi-telephone-fill"></i></button>
                    <button class="card-food-btn"><i class="bi bi-chat-dots-fill"></i></button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h2><b>Other Foods</b></h2>
            <section class="food_section layout_padding-bottom">
                <div class="container">
                    <div class="row grid">
                            @for ($i = 1; $i < 6; $i++)
                                <a href="/viewPost/{{$i}}" style="color: white">
                                    <div class="col-sm-6 col-lg-4 all ">
                                        <div class="box">
                                        <div>
                                            <div class="img-box position-relative">
                                                <div class="position-absolute p-3 bg-danger text-center" style="top: 10px;right:-60px;transform: rotate(45deg);width:200px">30% off</div>
                                                <img src="{{asset('assets1/images/f'.$i.'.png')}}" alt="">
                                            </div>
                                            <div class="detail-box">
                                            <h5>Delicious Pizza</h5>
                                            <p>
                                                Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                                            </p>
                                            <span>{{date('d-M-Y')}}</span>
                                        </a>
                                            <div class="options">
                                                <div>
                                                    <h5><b>$3</b></h5>
                                                    <p style="font-size: 15px"><s style="text-decoration-color:red">$5</s></p>
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            {{-- here --}}
                            @endfor

                    </div>

                </div>
            </section>

        </div>
    </section>

@endsection