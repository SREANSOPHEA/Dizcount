<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Dizcount </title>
  <link rel="icon" href="{{asset('assets/img/dizcount.png')}}">
  <link rel="stylesheet" href="{{asset('assets1/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets1/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets1/css/responsive.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
</head>
<body>

  @if (app()->getLocale()=='en')
    <style>
      body{
        font-family: 'Arial Rounded MT Bold';
      }
    </style>
  @else
    <style>
      body{
        font-family: "Khmer OS Battambang";
      }
    </style>
  @endif
  <div class="">
    {{-- <div class="bg-box bg-dark">
      <img src="{{asset('assets1/images/hero-bg.jpg')}}" alt="">
    </div> --}}

    <header class="header_section bg-dark">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/"><span>Dizcount </span></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav   mx-auto ">
              <li class="nav-item {{request()->path() == '/'?'active':''}}">
                <a class="nav-link" href="/">@lang('message.home')<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{request()->path() == 'about'?'active':''}}">
                <a class="nav-link" href="/about">@lang('message.about')</a>
              </li>
              <li class="nav-item {{request()->path() == 'contact'?'active':''}}">
                <a class="nav-link" href="/contact">@lang('message.contact')</a>
              </li>
            </ul>


            <div class="user_option">

              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img style="height: 30px;width:50px;margin-right:10px" src="{{asset('assets1/images/'.app()->getLocale().'_flag.png')}}" alt="">{{app()->getLocale()=='en'?'English':'ខ្មែរ'}}
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="language/en"><img style="height: 30px;width:50px" src="{{asset('assets1/images/en_flag.png')}}" alt=""> English</a></li>
                  <li><a class="dropdown-item" href="language/kh"><img style="height: 30px;width:50px" src="{{asset('assets1/images/kh_flag.png')}}" alt=""> ខ្មែរ</a></li>
                </ul>
              </div>


            </div>

          </div>
        </nav>
      </div>
    </header>
  </div>

  @yield('content')

  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>@lang('message.contact_us')</h4>
            <div class="contact_link_box">
              <div>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+855 81 262 328</span>
              </div>
              <div class="mt-3">
                <a href="https://t.me/Dizcount_support" target="_blank">
                  <i class="fa fa-telegram" aria-hidden="true"></i>
                  {{-- <span>https://t.me/Dizcount_support</span> --}}
                  <span>@lang('message.telegram')</span>
                </a>
              </div>
              <div class="mt-3">
                <a href="https://maps.app.goo.gl/w1GbJGDzenjxbH9T9" target="_blank">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  {{-- <span>https://t.me/Dizcount_support</span> --}}
                  <span>@lang('message.our_location')</span>
                </a>
              </div>
              <div class="mt-3">
                <img style="height: 130px" class="rounded" src="{{asset('assets1/images/qrCode.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="/" class="footer-logo">Dezcount</a>
            <p>@lang('message.short_quote')</p>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>@lang('message.opening_hour')</h4>
          <p>@lang('message.monday_friday') (08:00 am - 5:00 pm)</p>
          <p>@lang('message.saturday') (08:00 am - 12:00 pm)</p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> Distributed By CodeTech Solution

        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{asset('assets1/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('assets1/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets1/js/custom.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>