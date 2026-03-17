@extends('admin.adminMasterPage')
@section('content')

<style>
    :root {
      --accent: #0f9e5e;
      --accent-light: #e8f7ef;
      --accent-border: #a8dfc0;
      --accent-text: #0a7a48;
      --accent-deep: #0a4a2a;
      --bg-page: #F5F4F1;
      --bg-white: #ffffff;
      --border: #eeeeee;
      --text-main: #1a1a1a;
      --text-muted: #777777;
      --text-faint: #bbbbbb;
    }
    .back-bar { background: var(--bg-page); padding: 14px 20px; }
    .btn-back {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 13px;
      color: var(--accent);
      font-weight: 600;
      text-decoration: none;
      padding: 7px 16px;
      border: 1px solid var(--accent-border);
      border-radius: 30px;
      background: var(--bg-white);
      transition: background 0.2s;
    }
    .btn-back:hover { background: var(--accent-light); color: var(--accent); }

    /* ── Hero ── */
    .hero-section { background: var(--bg-white); border-bottom: 1px solid var(--border); }
    .hero-img-wrap {
      width: 100%;
      height: 300px;
      background: linear-gradient(135deg, #e8f7ef 0%, #b8ecd4 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 110px;
      position: relative;
      overflow: hidden;
    }
    .hero-img-wrap img {
      width: 100%; height: 100%;
      object-fit: cover;
      display: block;
    }
    .hero-img-wrap::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom, transparent 45%, rgba(255,255,255,0.95) 100%);
      pointer-events: none;
    }

    /* Free badge */
    .free-badge {
      position: absolute;
      top: 20px; right: 20px;
      background: var(--accent);
      color: #fff;
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 900;
      padding: 10px 16px;
      border-radius: 12px;
      border: 4px solid #fff;
      z-index: 5;
      text-align: center;
      line-height: 1.2;
      box-shadow: 0 6px 20px rgba(15,158,94,0.3);
      animation: popIn 0.5s 0.2s both;
    }
    .free-badge span {
      display: block;
      font-family: 'DM Sans', sans-serif;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 2px;
      opacity: 0.9;
    }
    .type-tag {
      position: absolute;
      top: 20px; left: 20px;
      background: var(--accent);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 30px;
      z-index: 5;
    }

    /* Shop meta */
    .hero-meta {
      padding: 18px 20px 4px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .shop-avatar {
      width: 40px; height: 40px;
      border-radius: 10px;
      background: var(--accent-light);
      border: 1px solid var(--accent-border);
      display: flex; align-items: center; justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
      overflow: hidden;
    }
    .shop-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .shop-name-text { font-size: 25px; color: #000000; font-weight: 500; letter-spacing: 0.5px; }

    /* ── Content ── */
    .main-content { padding: 20px 0 40px; }

    .food-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.6rem, 4vw, 2rem);
      font-weight: 900;
      color: var(--text-main);
      line-height: 1.15;
      margin-bottom: 8px;
    }
    .food-desc {
      font-size: 0.875rem;
      color: var(--text-muted);
      line-height: 1.75;
      margin-bottom: 22px;
    }

    /* Price strip */
    .price-strip {
      background: var(--bg-white);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 24px;
    }
    .price-main {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 900;
      color: var(--text-main);
      line-height: 1;
    }
    .price-cur { font-size: 13px; color: #aaa; margin-left: 3px; }
    .free-chip {
      margin-left: auto;
      background: var(--accent-light);
      border: 1px solid var(--accent-border);
      color: var(--accent-text);
      font-size: 12px;
      font-weight: 700;
      padding: 6px 14px;
      border-radius: 30px;
      white-space: nowrap;
    }

    /* Free item highlight */
    .free-highlight {
      background: var(--accent-light);
      border: 1px solid var(--accent);
      border-radius: 14px;
      padding: 18px;
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 28px;
    }
    .free-icon-box {
      width: 62px; height: 62px;
      border-radius: 14px;
      background: #c4ecd8;
      display: flex; align-items: center; justify-content: center;
      font-size: 30px;
      flex-shrink: 0;
      animation: giftPulse 2.5s infinite;
    }
    .free-icon-box img { width: 100%; height: 100%; object-fit: cover; border-radius: 10px; }
    .free-item-label {
      font-size: 10px;
      color: var(--accent);
      letter-spacing: 2px;
      text-transform: uppercase;
      font-weight: 700;
      margin-bottom: 4px;
    }
    .free-item-name {
      font-size: 16px;
      color: var(--accent-deep);
      font-weight: 700;
      margin-bottom: 3px;
    }
    .free-item-sub { font-size: 12px; color: #4dbd88; }

    /* Section label */
    .sec-label {
      font-size: 10px;
      color: var(--accent);
      letter-spacing: 2.5px;
      text-transform: uppercase;
      font-weight: 700;
      margin-bottom: 12px;
    }

    /* Info tiles */
    .info-tile {
      background: var(--bg-white);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 14px 16px;
      height: 100%;
    }
    .tile-lbl {
      font-size: 10px;
      color: var(--text-faint);
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 5px;
    }
    .tile-val { font-size: 14px; color: var(--text-main); font-weight: 600; }
    .tile-val.accent { color: var(--accent); }

    /* Date bar */
    .date-bar {
      background: var(--bg-white);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 14px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }
    .date-range { font-size: 13px; color: #666; }
    .date-range strong { color: #333; font-weight: 600; }
    .status-pill {
      background: var(--accent);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 6px 18px;
      border-radius: 30px;
    }

    .section-divider { height: 1px; background: var(--border); margin: 24px 0; }
</style>

<div class="pagetitle">
    <h1>View Detail</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewPost">Post</a></li>
        <li class="breadcrumb-item active">View Discount Percentage (%)</li>
      </ol>
    </nav>
</div>


<div class="card" style="background-color: var(--bg-page) !important;">
<div class="hero-section fade-up d1">
    <div class="hero-img-wrap">
      <img src="{{asset('assets/img/'.$data->purchase_img)}}" alt="">
      <div class="type-tag">Free Item</div>
      <div class="free-badge">FREE<span>ITEM</span></div>
    </div>
    <a href="/admin/viewShop/{{$data->shop->id}}">
    <div class="hero-meta fade-up d2">
      <div class="shop-avatar">
        <img src="{{asset('assets/img/'.$data->shop->logo_url)}}" alt="shop logo">
      </div>
      <span class="shop-name-text">{{$data->shop->name}}</span>
    </div>
    </a>
  </div>

  <!-- Main content -->
  <div class="container" style="max-width:680px;">
    <div class="main-content">

      <!-- Title & desc -->
      <h1 class="food-title fade-up d2">{{$data->purchase_item}} {{$data->purchase_quantity == 1?'':'(x'.$data->purchase_quantity.')'}} {{$data->title?$data->title:''}}</h1>
      <p class="food-desc fade-up d3">{{$data->description}}</p>

      <!-- Price strip -->
      <div class="price-strip fade-up d3">
        <span class="price-main">{{$data->currency == 'dollar'?'$':'៛'}}{{ number_format($data->price*$data->purchase_quantity, $data->currency=='dollar'?'2':'0') }}<span class="price-cur">{{$data->currency == 'dollar'?'USD':'KHR'}}</span></span>
        <span class="free-chip"><i class="bi bi-gift-fill me-1"></i> + Free item included</span>
      </div>

      <!-- Free item highlight -->
      <p class="sec-label fade-up d4">Free Item Included</p>
      <div class="free-highlight fade-up d4">
        <div class="free-icon-box">
          <img src="{{asset('assets/img/'.$data->discount_free->free_img)}}" alt="">
        </div>
        <div>
          <div class="free-item-label">Free with every order</div>
          <div class="free-item-name">{{$data->discount_free->free_item}}</div>
          <div class="free-item-sub">x{{$data->discount_free->free_quantity}} per order</div>
        </div>
      </div>

      <div class="section-divider fade-up d4"></div>

      <!-- Deal details -->
      <p class="sec-label fade-up d4">Deal Details</p>
      <div class="row g-2 mb-4 fade-up d4">
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Free Item Image</div>
            <img src="{{asset('assets/img/'.$data->discount_free->free_img)}}" style="height: 50px" alt="">
          </div>
        </div>

        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Free Item</div>
            <div class="tile-val">{{$data->discount_free->free_item }}</div>
          </div>
        </div>
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Type</div>
            <div class="tile-val accent">Free Item</div>
          </div>
        </div>
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Free Qty</div>
            <div class="tile-val">{{$data->discount_free->free_quantity}} per order</div>
          </div>
        </div>

      </div>


      <!-- Date & status -->
      <div class="date-bar fade-up d6">
        <div class="date-range">
          <i class="bi bi-calendar3 me-2"></i>
          <strong>{{\Carbon\Carbon::parse($data->start_date)->format('d-M-Y')}}</strong> &ndash; <strong>{{\Carbon\Carbon::parse($data->end_date)->format('d-M-Y')}}</strong>
        </div>
        <div class="status-pill">
          {{-- <i class="bi bi-lightning-fill me-1"></i> --}}
            @php
              use Carbon\Carbon;
                $now = Carbon::now();
                if ($now->lt($data->start_date)) {
                     $status = 'pendung';
                } elseif ($now->between($data->start_date, $data->end_date)) {
                      $status = 'active';
                } elseif ($data->end_date && $now->gt($data->end_date)) {
                      $status = 'expired';
                }
            @endphp
            {{$status}}
        </div>
      </div>

    </div>
  </div>
</div>

@endsection