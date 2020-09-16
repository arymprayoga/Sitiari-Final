@extends('layouts.master-admin')

@section('content')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
        <form action="{{route('user.search-pekerja')}}" method="get">
          <div class="card-header">
            <h3 class="card-title">Daftar Pekerja</h3>
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
                  <th>jenisPekerjaan</th>
                  <th>Gaji</th>
                  <th>Detail</th>
                  <th>Transaksi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($pekerja as $item)                
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->status}}</td>
                  <td>{{$item->jenisPekerjaan}}</td>
                  <td>{{$item->gaji}}</td>
                  <td>
                    <button class="btn btn-success" data-toggle="modal" data-id="{{$item->id}}" data-name="{{$item->name}}"
                    data-email="{{$item->email}}" data-status="{{$item->status}}" data-jenispekerjaan="{{$item->jenisPekerjaan}}" 
                    data-gaji="{{$item->gaji}}" data-noktp="{{$item->detailPekerja->nomorKTP}}" data-ttl="{{$item->detailPekerja->ttl}}" 
                    data-tel="{{$item->detailPekerja->tel}}" data-alamat="{{$item->detailPekerja->alamat}}" data-keahlian="{{$item->detailPekerja->keahlian}}"
                    data-agama="{{$item->detailPekerja->agama}}" data-tanggalmasuk="{{$item->detailPekerja->tanggalMasuk}}" data-fotodiri="{{$item->detailPekerja->fotoDiri}}" 
                    data-fotoktp="{{$item->detailPekerja->fotoKTP}}" data-rating="{{$item->detailPekerja->rating}}" data-target="#detailModalPekerja">Detail</button>
                  </td>
                  <td>
                    <form action="{{route('user.detail-transaksi-pekerja')}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="id_pekerja" value="{{$item->id}}">
                      <button type="submit" class="btn btn-primary">Transaksi</button>
                    </form>
                  </td>
                  <td>                      
                    <button class="btn btn-danger" data-toggle="modal" data-target="#blacklistModalPekerja" data-id="{{$item->id}}">Blacklist</button>                      
                  </td>
                </tr>
                @endforeach
              
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            {{$pekerja->links()}}
          </div>
        </div>
        <!-- /.card -->
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="detailModalPekerja" tabindex="-1" role="dialog" aria-labelledby="detailModalPekerjaLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalPekerjaLabel">Detail Pekerja</h5>
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
                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                    <input readonly type="text" class="form-control" name="jenisPekerjaan" id="jenisPekerjaanDetail">
                  </div>
                  <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input readonly type="number" class="form-control" name="gaji" id="gajiDetail">
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
                    <label for="ttl">Tanggal Lahir</label>
                    <input readonly type="text" class="form-control" name="ttl" id="ttlDetail">
                  </div>
                  <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input readonly type="text" class="form-control" name="alamat" id="alamatDetail">
                  </div>
                  <div class="form-group">
                    <label for="keahlian">Keahlian</label>
                    <input readonly type="text" class="form-control" name="keahlian" id="keahlianDetail">
                  </div>
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <input readonly type="text" class="form-control" name="agama" id="agamaDetail">
                  </div>
                  <div class="form-group">
                    <label for="rating">Rating</label>
                    <input readonly type="text" class="form-control" name="rating" id="ratingDetail">
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
<div class="modal modal-danger fade" id="blacklistModalPekerja" tabindex="-1" role="dialog" aria-labelledby="deleteModalPekerjaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="blacklistModalPekerjaLabel">Konfirmasi Blacklist Pekerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.blacklist-pekerja')}}" method="post">
          {{csrf_field()}}
          <div class="modal-body">
              <h5 class="text-center"> Yakin akan memblacklist pekerja ini?</h5>
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