@extends('layouts.master-majikan')

@section('content')
<br>
<div class="container">
<div class="row">
    <div class="col-lg-4">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{$perpanjang}}</h3>

          <p>Pesanan Yang Harus Diperpanjang</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/majikan/perpanjang-pekerja-page" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
        <h3>{{$rating}}</h3>

          <p>Pesanan Yang belum Di Rating</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/majikan/rating-pekerja-page" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    {{-- <div class="col-lg-4">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{$pendaftar}}</h3>

          <p>Pekerja Baru Yang Mendaftar</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/pendaftaran-pekerja" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div> --}}
    <!-- ./col -->
  </div>
  <!-- /.row -->
</div>
@endsection
