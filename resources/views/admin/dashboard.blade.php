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
                    <h6>5</h6>
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
                    <h6>25</h6>
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
                <h5 class="card-title">Customers</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>
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
                    <h6>5</h6>
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
                    <h6>25</h6>
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
                    <h6>10</h6>
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
                    <h5 class="card-title">
                      Recent Requests
                    </h5>

                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Shop</th>
                          <th scope="col">Food</th>
                          <th scope="col">Price</th>
                          <th scope="col">Discount(%)</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">End Date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><a href="#">#1</a></th>
                          <td>Rice Express</td>
                          <td>
                            <a href="#" class="text-primary">បាយឆា</a>
                          </td>
                          <td>$2.5</td>
                          <td>10%</td>
                          <td>3-Mar-2026</td>
                          <td>5-Mar-2026</td>
                          <td>
                            <span class="badge bg-success">Approved</span>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">#2</a></th>
                          <td>GoGo Chicken&Burger</td>
                          <td>
                            <a href="#" class="text-primary">Burger</a>
                          </td>
                          <td>$2.5</td>
                          <td>10%</td>
                          <td>3-Mar-2026</td>
                          <td>5-Mar-2026</td>
                          <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">#3</a></th>
                          <td>Heekcaa</td>
                          <td>
                            <a href="#" class="text-primar">Milk Tea</a>
                          </td>
                          <td>$2.5</td>
                          <td>10%</td>
                          <td>3-Mar-2026</td>
                          <td>5-Mar-2026</td>
                          <td><span class="badge bg-danger">Rejected</span></td>
                        </tr>
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