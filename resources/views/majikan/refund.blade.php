@extends('layouts.master-majikan')

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
                <th>Nama Pekerja</th>
                <th>Waktu Pesan</th>
                <th>Status Pemesanan</th>
                <th>Rating</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                    <tr>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pesan}}</td>
                        <td>{{$item->status_pemesanan}}</td>
                        <td>{{$item->rating}}</td>
                        <td>
                        <button class="btn btn-primary" data-toggle="modal" data-id="{{$item->id}}" data-target="#claimGaransiModal">
                            Claim
                            </button>
                        </td>
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

  {{-- Rating Modal --}}
<div class="modal modal-danger fade" id="claimGaransiModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalPekerjaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="claimGaransiModalLabel">Claim Garansi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('majikan.claim-garansi')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center">Masukkan Alasan Claim Garansi</h5>
                <br>
                <div class="text-center">
                <textarea name="alasan" required id="alasan" cols="50" rows="5"></textarea>
            </div>
                <input type="hidden" name="pemesanan_id_lama" id="idDelete" value="">
            </div>
            <div class="modal-footer">
                <button button type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Of Rating Modal --}}
@endsection