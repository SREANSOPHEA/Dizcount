@extends('admin.adminMasterPage')
@section('content')

<style>
    :root {
      --accent: #E8510A;
      --accent-dim: rgba(232,81,10,0.08);
      --accent-border: rgba(232,81,10,0.25);
      --bg-page: #F5F4F1;
      --bg-card: #FFFFFF;
      --bg-card2: #FAFAF9;
      --border: #E8E6E1;
      --text-primary: #1A1A1A;
      --text-muted: #888888;
      --text-faint: #BBBBBB;
    }

    body, .main, .pagetitle {
      background-color: var(--bg-page) !important;
    }

    /* ── Hero / Logo wrapper ── */
    .logo-wraper {
      /* background: linear-gradient(160deg, #fff8f4 0%, #fdeee6 55%, #fff8f4 100%); */
      border-bottom: 4px solid var(--accent);
    }

    .shopLogo {
      margin: 0 auto;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      overflow: hidden;
      border: 4px solid var(--accent);
      background-color: #fff;
      position: relative;
      box-shadow: 0 4px 20px rgba(232,81,10,0.15);
    }

    .shopImage {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    .shop-title {
      color: var(--text-primary) !important;
      font-weight: 700;
    }

    /* ── Section label ── */
    .section-label {
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--accent);
    }

    /* ── Info Cards ── */
    .info-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 14px 16px;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: border-color 0.25s, transform 0.2s, box-shadow 0.25s;
      height: 100%;
      text-decoration: none;
    }
    .info-card:hover {
      border-color: var(--accent);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(232,81,10,0.10);
    }

    .icon-wrap {
      width: 42px; height: 42px;
      border-radius: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }
    .icon-tg { background: rgba(41,182,246,0.10); color: #29B6F6; }
    .icon-ph { background: rgba(232,81,10,0.10); color: var(--accent); }
    .icon-social { background: rgba(232,81,10,0.08); color: var(--accent); }

    .card-label {
      font-size: 0.65rem;
      color: var(--text-muted);
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 3px;
    }
    .card-value {
      font-size: 0.875rem;
      color: var(--text-primary);
      font-weight: 600;
      word-break: break-all;
    }

    /* ── Map block ── */
    .map-block {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .map-visual {
      width: 100%;
      height: 250px;
      position: relative;
    }
    .map-visual iframe {
      width: 100%;
      height: 100%;
      border: 0;
      display: block;
    }
    .map-footer {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 16px;
      border-top: 1px solid var(--border);
      background: var(--bg-card2);
    }
    .map-footer-text {
      font-size: 0.78rem;
      color: var(--text-muted);
      flex: 1;
    }
    .btn-directions {
      background: var(--accent);
      color: #fff;
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 30px;
      border: none;
      white-space: nowrap;
      transition: opacity 0.2s;
      text-decoration: none;
    }
    .btn-directions:hover { opacity: 0.85; color: #fff; }

    /* ── Card wrapper ── */
    .detail-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 2px 16px rgba(0,0,0,0.06);
    }

    /* ── Content area ── */
    .content-area {
      background: var(--bg-page);
    }

    /* ── Row gap fix ── */
    .info-row {
      row-gap: 12px;
    }
</style>

<div class="pagetitle">
    <h1>View Shop in Detail</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewShop">Shops</a></li>
        <li class="breadcrumb-item active">Detail about Shop</li>
      </ol>
    </nav>
</div>

<div class="detail-card">

  {{-- ── Hero ── --}}
  <div class="text-center logo-wraper bg-light p-4">
    <div class="shopLogo">
      <img src="{{ asset('assets/img/' . $data->logo_url) }}"
           class="h-100 shopImage" alt="{{ $data->name }} logo">
    </div>
    <h1 class="shop-title mt-3 mb-0">{{ $data->name }}</h1>
  </div>

  {{-- ── Body ── --}}
  <div class="content-area p-3 p-md-4">

    {{-- Contact --}}
    <p class="section-label mb-3">Contact the Shop</p>
    <div class="row info-row mb-4">

      <div class="col-12 col-lg-6">
        <a href="{{ $data->telegram }}" target="_blank" class="text-decoration-none">
          <div class="info-card">
            <div class="icon-wrap icon-tg">
              <i class="bi bi-telegram"></i>
            </div>
            <div>
              <div class="card-label">Telegram</div>
              <div class="card-value">{{ $data->telegram }}</div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-lg-6">
        <a href="tel:{{ $data->phone }}" class="text-decoration-none">
          <div class="info-card">
            <div class="icon-wrap icon-ph">
              <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
              <div class="card-label">Phone</div>
              <div class="card-value">{{ $data->phone }}</div>
            </div>
          </div>
        </a>
      </div>

    </div>

    {{-- Location --}}
    <p class="section-label mb-3">Location</p>
    <div class="mb-4">
      <div class="map-block">
        <div class="map-visual">
          <iframe
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps?q={{ $data->location }}&hl=en&z=14&output=embed">
          </iframe>
        </div>
        <div class="map-footer">
          <i class="bi bi-geo-alt-fill" style="color: var(--accent); font-size: 1rem; flex-shrink:0;"></i>
          <span class="map-footer-text">{{ $data->location }}</span>
          <a href="https://www.google.com/maps/dir/?api=1&destination={{ $data->location }}"
             target="_blank" class="btn-directions">
            Directions
          </a>
        </div>
      </div>
    </div>

    {{-- Social Media --}}
    @if ($media)
      <p class="section-label mb-3">Social Media</p>
      <div class="row info-row mb-2">
        @foreach ($media as $m)
          <div class="col-12 col-lg-4">
            <a href="{{ $m->url }}" target="_blank" class="text-decoration-none">
              <div class="info-card">
                <div class="icon-wrap icon-social">
                  <i class="bi bi-{{ strtolower($m->platform) }}"></i>
                </div>
                <div>
                  <div class="card-label">{{ $m->platform }}</div>
                  <div class="card-value">{{ $m->url }}</div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</div>

@endsection