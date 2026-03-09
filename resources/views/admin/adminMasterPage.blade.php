<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dizcount-Admin</title>

    <link href="{{asset('assets/img/dizcount.png')}}" rel="icon">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">

    <link href="https://fonts.gstatic.com" rel="preconnect" />

    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="/admin" class="logo d-flex align-items-center">
          <img src="{{asset('assets/img/dizcount.png')}}" alt="Logo" />
          <span class="d-none d-lg-block">Dizcount</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="{{asset('assets/img/dizcount.png')}}" alt="Profile" class="rounded-circle"/>
              <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>Admin</h6>
                <span>Admin of Dizcount</span>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="/admin/signout">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul>

          </li>

        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link {{request()->path()=='admin'?'':'collapsed'}}" href="/admin">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>

        {{-- <li class="nav-heading">Posts</li> --}}

        <li class="nav-item">
          <a class="nav-link {{request()->is('*Post')?'':'collapsed'}}" data-bs-target="#posts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Posts</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="posts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="/admin/viewPost">
                <i class="bi bi-circle"></i><span>View Posts</span>
              </a>
            </li>
            <li>
              <a href="/admin/uploadPost">
                <i class="bi bi-circle"></i><span>Upload Post</span>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link {{request()->is('*Shop')?'':'collapsed'}}" data-bs-target="#shops-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Shop</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="shops-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="/admin/viewShop">
                <i class="bi bi-circle"></i><span>View Shops</span>
              </a>
            </li>
            <li>
              <a href="/admin/addShop">
                <i class="bi bi-circle"></i><span>Add Shop</span>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link {{request()->is('admin/category*')?'':'collapsed'}}" href="/admin/category">
            <i class="bi bi-grid"></i>
            <span>Category</span>
          </a>
        </li>

      </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">


      @yield('content')

    </main>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scriptlink')
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
  </body>
</html>
