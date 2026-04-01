@extends('admin.adminMasterPage')
@section('content')

<style>
    :root {
      --accent: #E8510A;
      --accent-light: #fff3ee;
      --accent-border: #ffd0b8;
      --accent-text: #c94000;
      --bg-page: #F5F4F1;
      --bg-white: #ffffff;
      --border: #eeeeee;
      --text-main: #1a1a1a;
      --text-muted: #777777;
      --text-faint: #bbbbbb;
    }
    .hero-section { background: var(--bg-white); border-bottom: 1px solid var(--border); }
    .hero-img-wrap {
      width: 100%;
      height: 300px;
      background: linear-gradient(135deg, #fff0e8 0%, #ffd9c4 100%);
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
    .pct-badge {
      position: absolute;
      top: 20px; right: 20px;
      width: 84px; height: 84px;
      background: var(--accent);
      border-radius: 50%;
      border: 4px solid #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      z-index: 5;
      box-shadow: 0 6px 20px rgba(232,81,10,0.3);
      animation: popIn 0.5s 0.2s both;
    }
    .pct-badge .pct-num {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      font-weight: 900;
      color: #fff;
      line-height: 1;
    }
    .pct-badge .pct-off {
      font-size: 9px;
      font-weight: 700;
      color: rgba(255,255,255,0.9);
      letter-spacing: 1.5px;
    }

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
      margin-bottom: 28px;
    }
    .price-orig {
      font-size: 15px;
      color: var(--text-faint);
      text-decoration: line-through;
    }
    .price-new {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 900;
      color: var(--accent);
      line-height: 1;
    }
    .price-cur { font-size: 13px; color: #aaa; margin-left: 3px; }
    .save-chip {
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
    .tile-val {
      font-size: 14px;
      color: var(--text-main);
      font-weight: 600;
    }
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

 @php
      $total = floatval($data->price) * intval($data->purchase_quantity);
      $discount = $data->discount_percentage->discount;
      $finalPrice = $total - ($total * $discount / 100);
      $save = $total - $finalPrice;
  @endphp
<div class="card" style="background-color: var(--bg-page) !important;">
  <div class="hero-section fade-up d1">
    <div class="hero-img-wrap">

      <img src="{{asset('assets/img/'.$data->purchase_img)}}" alt="">
      <div class="type-tag">% Discount</div>
      <div class="pct-badge">
        <span class="pct-num">{{$discount}} %</span>
        <span class="pct-off"> OFF</span>
      </div>
    </div>
    <a href="/admin/viewShop/{{$data->shop->id}}">
    <div class="hero-meta fade-up d2">
      <div class="shop-avatar">
        <img src="{{asset('assets/img/'.$data->shop->logo_url)}}" alt="shop Logo">
      </div>
      <span class="shop-name-text"><b>{{$data->shop->name}}</b></span>
    </div>
  </a>
  </div>


  <div class="container" style="max-width:680px;">
    <div class="main-content">

      <!-- Title & desc -->
      <h1 class="food-title fade-up d2">
        {{$data->purchase_item}} {{$data->purchase_quantity == 1 ?'':'(x'.$data->purchase_quantity.')'}}
        @if ($data->title)
            - {{$data->title}}
        @endif
      </h1>
      <p class="food-desc fade-up d3">{{$data->description}}</p>

      <!-- Price strip -->
      <div class="price-strip fade-up d3">
        <span class="price-orig">{{$data->currency == 'dollar'?'$':'៛'}}  {{ number_format($total, $data->currency=='dollar'?'2':'0') }}</span>
        <span class="price-new">{{$data->currency == 'dollar'?'$':'៛'}} {{ number_format($finalPrice, $data->currency=='dollar'?'2':'0') }}<span class="price-cur">{{$data->currency == 'dollar'?'USD':'KHR'}}</span></span>
        <span class="save-chip"><i class="bi bi-tag-fill me-1"></i>You save {{$data->currency == 'dollar'?'$':'៛'}} {{ number_format($save, $data->currency=='dollar'?'2':'0') }}</span>
      </div>

      <!-- Discount details -->
      <p class="sec-label fade-up d4">Discount Details</p>
      <div class="row g-2 mb-4 fade-up d4">
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Discount</div>
            <div class="tile-val accent">{{$discount}}% OFF</div>
          </div>
        </div>
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Type</div>
            <div class="tile-val">Percentage</div>
          </div>
        </div>
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Original Price</div>
            <div class="tile-val">{{$data->currency == 'dollar'?'$':'៛'}}{{ number_format($total, $data->currency=='dollar'?'2':'0') }} {{$data->currency == 'dollar'?'USD':'KHR'}}</div>
          </div>
        </div>
        <div class="col-6">
          <div class="info-tile">
            <div class="tile-lbl">Discounted Price</div>
            <div class="tile-val accent">{{$data->currency == 'dollar'?'$':'៛'}} {{ number_format($finalPrice, $data->currency=='dollar'?'2':'0') }} {{$data->currency == 'dollar'?'USD':'KHR'}}</div>
          </div>
        </div>
      </div>

      <div class="section-divider fade-up d5"></div>

      <!-- Date & status -->
      <div class="date-bar fade-up d6">
        <div class="date-range">
          <i class="bi bi-calendar3 me-2"></i>
          <strong>{{\Carbon\Carbon::parse($data->start_date)->format('d-M-Y')}}</strong> &ndash; <strong>{{\Carbon\Carbon::parse($data->end_date)->format('d-M-Y')}}</strong>
        </div>

            @php
              use Carbon\Carbon;
                $now = Carbon::now();
                if ($now->lt($data->start_date)) {
                  $bg = 'bg-warning';
                  $status = 'inactive';
                } elseif ($now->between($data->start_date, $data->end_date)) {
                  $bg = 'bg-success';
                  $status = 'active';
                } elseif ($data->end_date && $now->gt($data->end_date)) {
                  $status = 'expired';
                  $bg = 'bg-danger';
                }
            @endphp
        <div class="status-pill {{$bg}}">
          {{-- <i class="bi bi-lightning-fill me-1"></i> --}}

            {{$status}}
        </div>
      </div>

    </div>
  </div>

</div>

@endsection