@extends('user.userMasterPage')

@section('content')

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Contact Us</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <textarea class="form-control"  cols="30" rows="30" placeholder="Your Message"></textarea>
              </div>
              <div class="btn_box">
                <button>Send Message</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1954.2472106158077!2d104.8901824!3d11.5880569!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109519599828647%3A0xff19583ab18ba7f1!2sSen%20sok%20town!5e0!3m2!1skm!2skh!4v1772698292546!5m2!1skm!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection