@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Claim Garansi</h3>
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
                <th>ID Pesanan</th>
                <th>Nama Pekerja</th>
                <th>Waktu Pesan</th>
                <th>Status Pemesanan</th>
                <th>Rating</th>
                <th>Waktu Pengajuan Garansi</th>
                <th>Status Refund</th>
                <th>Alasan Refund</th>
                <th>Waktu Konfirmasi Refund</th>
                <th>ID Pesanan Baru</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                    <tr>
                        <td>{{$item->pemesanan_id_lama}}</td>
                        <td>{{$item->pemesanan->pekerja->name}}</td>
                        <td>{{$item->pemesanan->waktu_pesan}}</td>
                        <td>{{$item->pemesanan->status_pemesanan}}</td>
                        <td>{{$item->pemesanan->rating}}</td>
                        <td>{{$item->waktu_pengajuan_refund}}</td>
                        <td>{{$item->status_refund}}</td>
                        <td>{{$item->alasan}}</td>
                        <td>{{$item->waktu_konfirmasi_refund}}</td>
                        <td>{{$item->pemesanan_id_baru}}</td>
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