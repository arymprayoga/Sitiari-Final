
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sitiari</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Majikan Sitiari</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/majikan" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pesan PRT
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/majikan/pesan-babysitter" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Babysitter</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/majikan/pesan-pembantu" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Pembantu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/majikan/pesan-perawat" class="nav-link">
                    <i class="fas fa-user-tie nav-icon"></i>
                    <p>Perawat Lansia</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="/majikan/riwayat-pemesanan" class="nav-link">
              <i class="fas fa-history nav-icon"></i>
              <p>
                Riwayat Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/majikan/rating-pekerja-page" class="nav-link">
              <i class="fas fa-star nav-icon"></i>
              <p>
                Rating Pekerja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/majikan/perpanjang-pekerja-page" class="nav-link">
              <i class="fas fa-money-bill-wave nav-icon"></i>
              <p>
                Perpanjang Pekerja
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Claim Garansi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/majikan/claim-garansi-page" class="nav-link">
                  <i class="fas fa-hands nav-icon"></i>
                  <p>
                    Claim
                  </p>
                </a>
              </li>
                <li class="nav-item">
                  <a href="/majikan/riwayat-garansi" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Riwayat Claim Garansi</p>
                  </a>
                </li>
              </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="/majikan/edit-profil" class="nav-link">
              <i class="fas fa-user-alt nav-icon"></i>
              <p>
                Profil
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="/majikan/logout" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content container-fluid">
      @if (session('alert'))
      <div class="alert alert-danger" role="alert">
          {{ session('alert') }}
      </div>
  @endif
  @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
      @endif
        @yield('content')
    </section>
  </div>
  <!-- /.content-wrapper --> 
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/myScript.js')}}"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</body>
</html>
