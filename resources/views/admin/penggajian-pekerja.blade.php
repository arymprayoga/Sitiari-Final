@extends('layouts.master-admin')

@section('content')

 {{-- Delete Modal --}}
 <div class="modal modal-danger fade" id="deleteModalGaji" tabindex="-1" role="dialog" aria-labelledby="deleteModalGajiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalGajiLabel">Konfirmasi Penggajian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.gaji-pekerja')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center"> Yakin akan menggaji pekerja ini?</h5>
                <input type="hidden" name="id" id="idDelete" value="">
            </div>
            <div class="modal-footer">
                <button button type="button" class="btn btn-secondary">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Of Delete Modal --}}

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Penggajian Pekerja</h3>
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
                <th>Nama Pekerja</th>
                <th>Waktu Pemesanan</th>
                <th>Jumlah Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($penggajian as $item)
                    <tr>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pemesanan}}</td>
                        <td>{{$item->jumlah_bayar}}</td>
                        <td>{{$item->status_penggajian}}</td>
                        <td>
                        <button class="btn btn-info" data-toggle="modal" data-id="{{$item->id}}" data-target="#deleteModalGaji">Gaji</button>
                      </td>
                    </tr>
                @endforeach              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="container">
    </div>
    </div>
  </div>
@endsection