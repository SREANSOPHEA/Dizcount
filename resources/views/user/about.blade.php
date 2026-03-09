@extends('user.userMasterPage')

@section('content')
  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{asset('assets/img/dizcount.png')}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>@lang('message.we_dizcount')</h2>
            </div>
            <p style="text-align: justify">@lang('message.long_quote')</p>
            <a href="https://t.me/dizcount_kh" target="_blank">@lang('message.view_our_channel')</a>
          </div>
        </div>
      </div>
    </div>
  </section>




@endsection