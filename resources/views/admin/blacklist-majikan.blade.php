@extends('layouts.master-admin')

@section('content')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
        <form action="{{route('user.search-majikan')}}" method="get">
          <div class="card-header">
            <h3 class="card-title">Daftar Majikan</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>        
          </div>
      </form>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>                  
                  <th>Status</th>
                  <th>Detail</th>
                  <th>Transaksi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($majikan as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->status}}</td>
                  <td>
                    <button class="btn btn-success" data-toggle="modal" data-id="{{$item->id}}" data-name="{{$item->name}}"
                      data-email="{{$item->email}}" data-status="{{$item->status}}" data-noktp="{{$item->detailMajikan->nomorKTP}}" 
                      data-tel="{{$item->detailMajikan->tel}}" data-alamat="{{$item->detailMajikan->alamat}}" 
                      data-tanggalmasuk="{{$item->detailMajikan->tanggalMasuk}}" data-fotodiri="{{$item->detailMajikan->fotoDiri}}" 
                      data-fotoktp="{{$item->detailMajikan->fotoKTP}}" data-target="#detailModalMajikan">Detail</button>
                    </td>
                  <td>
                    <form action="{{route('user.detail-transaksi-majikan')}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="id_majikan" value="{{$item->id}}">
                      <button type="submit" class="btn btn-primary">Transaksi</button>
                    </form>
                  </td>
                  <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#blacklistModalMajikan" data-id="{{$item->id}}">Blacklist</button>                      
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            {{-- {{$data[0]}} --}}
            {{$majikan->links()}}
          </div>
        </div>
        <!-- /.card -->
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="detailModalMajikan" tabindex="-1" role="dialog" aria-labelledby="detailModalMajikanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="detailModalMajikanLabel">Detail Majikan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input readonly type="text" class="form-control" name="id" id="idDetail">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input readonly type="text" class="form-control" name="name" id="nameDetail">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input readonly type="email" class="form-control" name="email" id="emailDetail">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input readonly type="text" class="form-control" name="status" id="statusDetail">
                    </div>
                    <div class="form-group">
                        <label for="noKTP">Nomor KTP</label>
                        <input readonly type="text" class="form-control" name="noKTP" id="noKTPDetail">
                    </div>
                    <div class="form-group">
                        <label for="tel">Nomor Telepon</label>
                        <input readonly type="text" class="form-control" name="tel" id="telDetail">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input readonly type="text" class="form-control" name="alamat" id="alamatDetail">
                    </div>
                    <div class="form-group">
                        <label for="tanggalMasuk">Tanggal Masuk</label>
                        <input readonly type="text" class="form-control" name="tanggalMasuk" id="tanggalMasukDetail">
                    </div>
                    <div class="form-group">
                        <label for="fotoDiri">Foto Diri</label>
                        <img id="fotoDiriDetail" class="img-fluid" src="" alt="">
                    </div>
                    <div class="form-group">
                        <label for="fotoKTP">Foto KTP</label>
                        <img id="fotoKTPDetail" class="img-fluid" src="" alt="">
                    </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    {{-- End Of Modal Detail --}}

    {{-- Delete Modal --}}
  <div class="modal modal-danger fade" id="blacklistModalMajikan" tabindex="-1" role="dialog" aria-labelledby="deleteModalMajikanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blacklistModalMajikanLabel">Konfirmasi Blacklist Majikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.blacklist-majikan')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center"> Yakin akan memblacklist majikan ini?</h5>
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
</div>

@endsection