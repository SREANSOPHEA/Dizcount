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

 <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>@lang('message.food')</h2>
      </div>

      {{-- <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".shop1">C-Bite</li>
        <li data-filter=".shop2">MaMaFriedRice</li>
        <li data-filter=".shop3">SooChicken</li>
        <li data-filter=".shop4">Rice Express</li>
      </ul> --}}

      <div class="filters-content">
        <div class="row grid">

            @for ($i = 0; $i < 2; $i++)
                @for ($x = 1; $x < 7; $x++)
                    @php
                        $foods = ['shop1', 'shop2', 'shop3','shop4'];
                        $randomFood = $foods[array_rand($foods)];
                    @endphp

                    <a href="/viewPost/{{$i}}-{{$x}}" style="color: white">
                        <div class="col-sm-6 col-lg-4 all  {{$randomFood}}">
                            <div class="box">
                            <div>
                                <div class="img-box position-relative">
                                    <div class="position-absolute p-3 bg-danger text-center" style="top: 10px;right:-60px;transform: rotate(45deg);width:200px">30% off</div>
                                    <img src="{{asset('assets1/images/f'.$x.'.png')}}" alt="">
                                </div>
                                <div class="detail-box">
                                <h5>Delicious Pizza</h5>
                                {{-- <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                                </p> --}}
                                <span>{{date('d-M-Y')}}</span>
                            </a>
                                <div class="options">
                                    <div>
                                        <h5><b>$3</b></h5>
                                        <p style="font-size: 15px"><s style="text-decoration-color:red">$5</s></p>
                                    </div>
                                    <div >
                                        <button class="card-food-btn" onclick="getDirections('House 8 ផ្លូវលេខ, ៥៤៨ 12151')"><i class="bi bi-geo-alt-fill"></i></button>
                                        <button  class="card-food-btn"><i class="bi bi-telephone-fill"></i></button>
                                        {{-- <a href="tel:0975978989">call</a> --}}
                                        <button class="card-food-btn"><i class="bi bi-chat-dots-fill"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                   {{-- here --}}

                @endfor
            @endfor
            @for ($i = 0; $i < 2; $i++)
                @for ($x = 1; $x < 7; $x++)
                    @php
                        $foods = ['shop1', 'shop2', 'shop3','shop4'];
                        $randomFood = $foods[array_rand($foods)];
                    @endphp

                    <a href="/viewPost/{{$i}}-{{$x}}" style="color: white">
                        <div class="col-sm-6 col-lg-4 all  {{$randomFood}}">
                            <div class="box">
                            <div>
                                <div class="img-box position-relative">
                                    <div class="position-absolute p-3 bg-danger text-center" style="top: 10px;right:-60px;transform: rotate(45deg);width:200px">Buy 1 Get 1</div>
                                    <img src="{{asset('assets1/images/f'.$x.'.png')}}" alt="">
                                </div>
                                <div class="detail-box">
                                <h5>Delicious Pizza</h5>
                                {{-- <p>
                                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                                </p> --}}
                                <span>{{date('d-M-Y')}}</span>
                            </a>
                                <div class="options">
                                    <div>
                                        {{-- <h5><b>$3</b></h5>
                                        <p style="font-size: 15px"><s style="text-decoration-color:red">$5</s></p> --}}
                                    </div>
                                    <div >
                                        <button class="card-food-btn" onclick="getDirections('House 8 ផ្លូវលេខ, ៥៤៨ 12151')"><i class="bi bi-geo-alt-fill"></i></button>
                                        <button class="card-food-btn"><i class="bi bi-telephone-fill"></i></button>
                                        <button class="card-food-btn"><i class="bi bi-chat-dots-fill"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                   {{-- here --}}

                @endfor
            @endfor

        </div>
      </div>
    </div>
  </section>


  <script>
function getDirections(destination) {
    // Encode destination for URL
    const encodedDest = encodeURIComponent(destination);

    // Check if device is mobile for better UX
    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    if (isMobile) {
        // Try to open native Google Maps app on mobile
        window.location.href = `google.navigation:q=${encodedDest}`;

        // Fallback after a short delay if app doesn't open
        setTimeout(function() {
            window.location.href = `https://www.google.com/maps/dir/?api=1&destination=${encodedDest}&travelmode=driving`;
        }, 500);
    } else {
        // Desktop - open in new tab
        window.open(`https://www.google.com/maps/dir/?api=1&destination=${encodedDest}&travelmode=driving`, '_blank');
    }
}

// With user's actual location
function getDirectionsWithLocation(destination) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const userLocation = `${position.coords.latitude},${position.coords.longitude}`;
            const encodedDest = encodeURIComponent(destination);

            window.open(`https://www.google.com/maps/dir/?api=1&origin=${userLocation}&destination=${encodedDest}&travelmode=driving`, '_blank');
        }, function() {
            // User denied location
            window.open(`https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(destination)}&travelmode=driving`, '_blank');
        });
    } else {
        // Geolocation not supported
        window.open(`https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(destination)}&travelmode=driving`, '_blank');
    }
}
</script>
@endsection