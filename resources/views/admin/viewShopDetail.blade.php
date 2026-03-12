@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>View Shop in Detail</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewShop">Shops</a></li>
        <li class="breadcrumb-item active">Detail about Shop</li>
      </ol>
    </nav>
</div>


<div class="card p-4">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img src="{{asset('assets/img/'.$data['logo_url'])}}" class="img-fluid" style="height: 150px" alt="">
        </div>
        <div class="col-12 col-lg-6 bg-danger">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31274.013128266044!2d104.83317326177085!3d11.53379782157363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31094fbd312449f5%3A0xaf3393bc9eda7678!2z4Z6f4Z624Z6A4Z6b4Z6c4Z634Z6R4Z-S4Z6Z4Z624Z6b4Z-Q4Z6Z4Z6U4Z-K4Z-C4Z6b4Z6S4Z644Z6i4Z6T4Z-S4Z6P4Z6a4Z6H4Z624Z6P4Z63IOGekeGeuOGfoiAo4Z6f4Z624Z6B4Z624Z6f4Z-S4Z6W4Z624Z6T4Z6i4Z624Z6A4Z624Z6f4Z6F4Z-E4Z6Y4Z6F4Z-FKQ!5e0!3m2!1skm!2skh!4v1773221079680!5m2!1skm!2skh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
</div>



@endsection