@extends('layouts.master-admin')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Claim Garansi</h3>
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
                <th>Waktu Pesan</th>
                <th>Rating</th>
                <th>Waktu Pengajuan Garansi</th>
                <th>Alasan Refund</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pesan}}</td>
                        <td>{{$item->rating}}</td>
                        <td>{{$item->garansi->waktu_pengajuan_refund}}</td>
                        <td>{{$item->garansi->alasan}}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-id="{{$item->id}}" data-target="#terimaGaransiModal">Terima</button> /
                        <button class="btn btn-danger" data-toggle="modal" data-id="{{$item->id}}" data-target="#tolakGaransiModal" >Tolak</button></td>
                    </tr>
                @endforeach              
            </tbody>
          </table>
        </div>
          </select>
        </li>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="container">
    </div>
    </div>
  </div>

  {{-- Tolak Modal --}}
  <div class="modal modal-danger fade" id="tolakGaransiModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tolakGaransiModalLabel">Tolak Claim Garansi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.tolak-garansi')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center">Apa Anda Yakin Ingin Menolak Permohonan Claim Garansi Ini?</h5>
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
  {{-- End Of Tolak Modal --}}

  {{-- Terima Modal --}}
  <div class="modal modal-danger fade" id="terimaGaransiModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="terimaGaransiModalLabel">Tolak Claim Garansi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.show-terima-garansi-page')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center">Apa Anda Yakin Ingin Menerima Permohonan Claim Garansi Ini?</h5>
                <input type="hidden" name="id" id="idDelete" value="">
            </div>
            <div class="modal-footer">
                <button button type="button" class="btn btn-secondary">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Of Terima Modal --}}

@endsection