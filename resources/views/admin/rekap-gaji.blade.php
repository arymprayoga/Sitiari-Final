@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Rekap Gaji</h3>
          <div class="card-tools">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Export Ke Excel</i></button>
            </div>
          </div>
          {{-- <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>         --}}
        </div>
    
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Pekerja</th>
                <th>Waktu Pemesanan</th>
                <th>Jumlah Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Waktu Pembayaran</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($gaji as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pemesanan}}</td>
                        <td>{{$item->jumlah_bayar}}</td>
                        <td>{{$item->status_penggajian}}</td>
                        <td>{{$item->waktu_bayar}}</td>
                    </tr>
                @endforeach              
            </tbody>
          </table>
        </div>
          </select>
        </li>
        {{-- <li class="nav-item col-1">
          <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Nama Pabrik"> -->
          <input type="Submit" class="btn btn-success mt-10 btn-md" style="float:Right;" value="Submit"/>
        </li> --}}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="container">
    </div>
    </div>
  </div>
@endsection