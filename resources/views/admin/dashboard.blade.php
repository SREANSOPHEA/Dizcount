@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">

          {{-- Total Shop --}}
          <div class="col-xl-4 col-md-6">
            <div class="card info-card blue-card">
              <div class="card-body">
                <h5 class="card-title">Total Shop</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop-window"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$shop}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- End Total Shop --}}

          {{-- Total Posts --}}
          <div class="col-xl-4 col-md-6">
            <div class="card info-card green-card">
              <div class="card-body">
                <h5 class="card-title">Total Posts</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-postcard-heart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$post}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- End Total Posts --}}

          <!-- Customers Card -->
          <div class="col-xl-4 col-md-6">
            <div class="card info-card orange-card">
              <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$admin}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Customers Card -->

          {{-- Total Active Post --}}
          <div class="col-xl-4 col-md-6">
            <div class="card info-card green-card">
              <div class="card-body">
                <h5 class="card-title">Active Posts</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-check"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$active}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- End Total Active Post --}}

          {{-- Total Expire Posts --}}
          <div class="col-xl-4 col-md-6">
            <div class="card info-card red-card">
              <div class="card-body">
                <h5 class="card-title">Expire Posts</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-x"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$expire}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- End Total Expire Posts --}}

          <!-- Total Pending Posts -->
          <div class="col-xl-4 col-md-6">
            <div class="card info-card orange-card">
              <div class="card-body">
                <h5 class="card-title">Pending Posts</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-hourglass"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$pending}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Total Pending Posts -->



              <!-- Recent Sales -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <h5 class="card-title">Recent Posts</h5>

                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Shop</th>
                          <th scope="col">Food</th>
                          <th scope="col">Price</th>
                          <th scope="col">Type</th>
                          <th scope="col">Start</th>
                          <th scope="col">End</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          use Carbon\Carbon;
                          $now = Carbon::now();
                          $i = 1

                        @endphp
                        @foreach ($recentPost as $data)
                        @php
                          if ($now->lt($data->start_date)) {
                              $status = 'pending';
                          } elseif ($now->between($data->start_date, $data->end_date)) {
                                $status = 'active';
                          } elseif ($data->end_date && $now->gt($data->end_date)) {
                                $status = 'expired';
                          }
                        @endphp
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$data->shop->name}}</td>
                          <td>{{$data->purchase_item}}</td>
                          <td>{{$data->currency == "dollar"?'$':'៛'}}{{ number_format($data->price, $data->currency=='dollar'?'2':'0') }}</td>
                          <td>
                            @if ($data->discount_type == 'percentage')
                              <span class="badge bg-success px-3 py-2">% Discount</span>
                            @else
                                <span class="badge bg-primary px-3 py-2">Free Item</span>
                            @endif
                          </td>
                          <td>{{ \Carbon\Carbon::parse($data->start_date)->format('d-M-Y') }}</td>
                          <td>{{ \Carbon\Carbon::parse($data->end_date)->format('d-M-Y') }}</td>
                          <td>
                            @php
                                $badgeClass = match($status) {
                                    'active' => 'success',
                                    'expired' => 'danger',
                                    'inactive' => 'secondary',
                                    default => 'warning'
                                };
                            @endphp
                            <span class="badge bg-{{$badgeClass}} p-2">{{$status}}</span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- End Recent Sales -->


            </div>
          </div>

        </div>
      </section>

@endsection