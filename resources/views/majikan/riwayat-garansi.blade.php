@extends('layouts.master-majikan')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Garansi</h3>
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
                <th>Waktu Pesan</th>
                <th>Status Pemesanan</th>
                <th>Rating</th>
                <th>Waktu Pengajuan Garansi</th>
                <th>Status Refund</th>
                <th>Alasan Refund</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                    <tr>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pesan}}</td>
                        <td>{{$item->status_pemesanan}}</td>
                        <td>{{$item->rating}}</td>
                        <td>{{$item->garansi->waktu_pengajuan_refund}}</td>
                        <td>{{$item->garansi->status_refund}}</td>
                        <td>{{$item->garansi->alasan}}</td>
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