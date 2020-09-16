@extends('layouts.master-admin')

@section('content')
<br>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat Pemesanan</h3>
            <div class="card-tools">
              {{-- <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Export Ke Excel</i></button>
              </div> --}}
            </div>
        </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <th>Nama Majikan</th>
              <th>Nama Pekerja</th>
              <th>Waktu Pesan</th>                  
              <th>Waktu Bayar</th>
              <th>Jumlah Bayar</th>
              <th>Status Pemesanan</th>
              <th>Status Pembayaran</th>
              <th>Rating</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pesanan as $item)
            <tr>
              <td>{{$item->majikan->name}}</td>
              <td>{{$item->pekerja->name}}</td>
              <td>{{$item->waktu_pesan}}</td>
              <td>{{$item->waktu_bayar}}</td>
              <td>{{$item->jumlah_bayar}}</td>
              <td>{{$item->status_pemesanan}}</td>
              <td>{{$item->status_pembayaran}}</td>
              <td>{{$item->rating}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection