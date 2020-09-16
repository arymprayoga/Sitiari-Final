@extends('layouts.master-admin')

@section('content')
<br>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Konfirmasi Resign Pekerja</h3>
        </div>
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
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pekerja as $item)
            <input type="hidden" name="id" value="{{$item->id}}">
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->status}}</td>
              <td>{{$item->jenisPekerjaan}}</td>
              <td>{{$item->gaji}}</td>
              <td>
                <button class="btn btn-success" type="button" data-toggle="modal" data-id="{{$item->id}}" data-name="{{$item->name}}"
                data-email="{{$item->email}}" data-status="{{$item->status}}" data-jenispekerjaan="{{$item->jenisPekerjaan}}" 
                data-gaji="{{$item->gaji}}" data-noktp="{{$item->detailPekerja->nomorKTP}}" data-ttl="{{$item->detailPekerja->ttl}}" 
                data-tel="{{$item->detailPekerja->tel}}" data-alamat="{{$item->detailPekerja->alamat}}" data-keahlian="{{$item->detailPekerja->keahlian}}"
                data-agama="{{$item->detailPekerja->agama}}" data-tanggalmasuk="{{$item->detailPekerja->tanggalMasuk}}" data-fotodiri="{{$item->detailPekerja->fotoDiri}}" 
                data-fotoktp="{{$item->detailPekerja->fotoKTP}}" data-rating="{{$item->detailPekerja->rating}}" data-target="#detailModalPendaftar">Detail</button>
              </td>
              <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#terimaModalResign" data-id="{{$item->id}}">Terima</button> / 
                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModalResign" data-id="{{$item->id}}">Tolak</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

{{-- Delete Modal --}}
<div class="modal modal-danger fade" id="deleteModalResign" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalResignLabel">Konfirmasi Tolak Resign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.tolak-resign-pekerja')}}" method="post">
          {{csrf_field()}}
          <div class="modal-body">
              <h5 class="text-center"> Yakin akan menolak permintaan resign dari pekerja ini?</h5>
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

{{-- Terima Modal --}}
<div class="modal modal-danger fade" id="terimaModalResign" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="terimaModalResignLabel">Konfirmasi Terima Resign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.resign-pekerja')}}" method="post">
          {{csrf_field()}}
          <div class="modal-body">
              <h5 class="text-center"> Yakin akan menerima permintaan resign dari pekerja ini?</h5>
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

{{-- Modal Detail --}}
<div class="modal fade" id="detailModalPendaftar" tabindex="-1" role="dialog" aria-labelledby="detailModalPekerjaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalPendaftarLabel">Detail Pekerja</h5>
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
</div>
@endsection