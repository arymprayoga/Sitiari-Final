
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
        <span class="brand-text font-weight-light">Admin Sitiari</span>
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
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
              <li class="nav-item">
                  <a href="/home" class="nav-link">
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
                  Member
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/daftar-pekerja" class="nav-link">
                      <i class="fas fa-child nav-icon"></i>
                      <p>Daftar Pekerja</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-majikan" class="nav-link">
                      <i class="fas fa-user nav-icon"></i>
                      <p>Daftar Majikan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-admin" class="nav-link">
                      <i class="fas fa-user-tie nav-icon"></i>
                      <p>Daftar Admin</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
              <a href="/pendaftaran-pekerja" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Pendaftaran Pekerja
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                  Penggajian Pekerja
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/penggajian-pekerja" class="nav-link">
                      <i class="fas fa-money-bill-wave nav-icon"></i>
                      <p>Penggajian</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/rekap-gaji" class="nav-link">
                      <i class="fas fa-history nav-icon"></i>
                      <p>Rekap Gaji</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
              <a href="/daftar-pemesanan" class="nav-link">
                <i class="fas fa-money-bill-wave nav-icon"></i>
                <p>
                  Riwayat Pemesanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/resign-pekerja" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Resign Pekerja
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                  Claim Garansi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/claim-garansi-page" class="nav-link">
                    <i class="nav-icon fas fa-hands"></i>
                    <p>
                      Claim 
                    </p>
                  </a>
                </li>
                  <li class="nav-item">
                    <a href="/riwayat-claim-garansi-page" class="nav-link">
                      <i class="fas fa-history nav-icon"></i>
                      <p>Riwayat Claim Garansi</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Blacklist
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/blacklist-pekerja" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Blacklist Pekerja
                    </p>
                  </a>
                </li>
                  <li class="nav-item">
                    <a href="/blacklist-majikan" class="nav-link">
                      <i class="fas fa-user nav-icon"></i>
                      <p>Blacklist Majikan</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
              <a href="/user/logout" class="nav-link">
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
        @if (session('sukses'))
          <div class="alert alert-primary" role="alert">
            {{ session('sukses') }}
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
  </body>
</html>
