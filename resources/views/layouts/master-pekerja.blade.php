
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
      <span class="brand-text font-weight-light">Pekerja Sitiari</span>
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
          @if (isset($pekerja) && $pekerja['status'] == 'resign')
          <li class="nav-item">
            <a href="/pekerja/riwayat-pemesanan" class="nav-link">
              <i class="fas fa-history nav-icon"></i>
              <p>
                Riwayat Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pekerja/riwayat-penggajian" class="nav-link">
              <i class="fas fa-money-bill-wave nav-icon"></i>
              <p>
                Riwayat Penggajian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pekerja/logout" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="/pekerja/riwayat-pemesanan" class="nav-link">
              <i class="fas fa-history nav-icon"></i>
              <p>
                Riwayat Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pekerja/riwayat-penggajian" class="nav-link">
              <i class="fas fa-money-bill-wave nav-icon"></i>
              <p>
                Riwayat Penggajian
              </p>
            </a>
          </li>
          @if (isset($pekerja) && $pekerja['status'] == 'resign_pending')
              
          @else
          <li class="nav-item">
            <a href="/pekerja/pengajuan-resign" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>
                Permohonan Resign
              </p>
            </a>
          </li> 
          @endif
                   
          <li class="nav-item">
            <a href="/pekerja/logout" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          @endif
          
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
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</body>
</html>
