@extends('layouts.master-admin')

@section('content')
<br>
<br><br>
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Pekerja Tersedia Untuk Claim Garansi</h3>     
          </div>
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
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pekerja as $item)  
                <form action="{{route('user.terima-garansi')}}" method="post">   
                  {{csrf_field()}}        
                <tr>
                  <input type="hidden" name="id_baru" value="{{$item->id}}">
                  <input type="hidden" name="id_lama" value="{{$idPekerjaLama}}">
                  <input type="hidden" name="id_majikan" value="{{$idMajikan}}">
                  <input type="hidden" name="id_pesanan" value="{{$idPesanan}}">
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
                      <button class="btn btn-primary" type="submit">Pilih</button>                      
                  </td>
                </tr>
              </form>   
                @endforeach
              
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
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

    {{-- Modal Add --}}
    <div class="modal fade" id="addModalPekerja" tabindex="-1" role="dialog" aria-labelledby="addModalPekerjaLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalPekerjaLabel">Tambah Pekerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('user.tambah-pekerja')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="modal-body">
                  <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" class="form-control" required name="name" id="nameAdd">
                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" required name="email" id="emailAdd">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" required name="password" id="passwordAdd">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="statusAdd" class="form-control">
                        <option>tersedia</option>
                        <option>bekerja</option>
                        <option>resign</option>
                        <option>blacklist</option>
                        <option>pending</option>
                        <option>resign_pending</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                    <select name="jenisPekerjaan" id="jenisPekerjaanAdd" class="form-control">
                        <option>pembantu</option>
                        <option>perawat</option>
                        <option>babysitter</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input type="number" class="form-control" required name="gaji" id="gajiAdd">
                  </div>
                  <div class="form-group">
                      <label for="nomorKTP">Nomor KTP</label>
                      <input type="number" class="form-control" required name="nomorKTP" id="nomorKTPAdd">
                  </div>
                  <div class="form-group">
                      <label for="tel">Nomor Telepon</label>
                      <input type="tel" class="form-control" required name="tel" id="telAdd">
                  </div>
                  <div class="form-group">
                    <label for="ttl">Tanggal Lahir</label>
                    <input type="date" class="form-control" required name="ttl" id="ttlAdd">
                  </div>
                  <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" required name="alamat" id="alamatAdd">
                  </div>
                  <div class="form-group">
                    <label for="keahlian">Keahlian</label>
                    <input type="text" class="form-control" required name="keahlian" id="keahlianAdd">
                  </div>
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control" required name="agama" id="agamaAdd">
                  </div>
                  <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" required name="rating" id="ratingAdd">
                  </div>
                  <div class="form-group">
                    <label for="fotoDiri">Foto Diri</label>
                    <input type="file" name="fotoDiri" id="fotoDiriAdd" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="fotoKTP">Foto KTP</label>
                    <input type="file" name="fotoKTP" id="fotoKTPAdd" required class="form-control">
                  </div>
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  {{-- End Of Modal Add --}}

  {{-- Modal Edit --}}
  <div class="modal fade" id="editModalPekerja" tabindex="-1" role="dialog" aria-labelledby="editModalPekerjaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalPekerjaLabel">Edit Pekerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.edit-pekerja')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" id="idEdit">
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="nameEdit">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="emailEdit">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="passwordEdit">
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" id="statusEdit" class="form-control">
                      <option>tersedia</option>
                      <option>bekerja</option>
                      <option>resign</option>
                      <option>blacklist</option>
                      <option>pending</option>
                      <option>resign_pending</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                  <select name="jenisPekerjaan" id="jenisPekerjaanEdit" class="form-control">
                      <option>pembantu</option>
                      <option>perawat</option>
                      <option>babysitter</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="gaji">Gaji</label>
                  <input type="number" class="form-control" name="gaji" id="gajiEdit">
                </div>
                <div class="form-group">
                    <label for="nomorKTP">Nomor KTP</label>
                    <input type="number" class="form-control" name="nomorKTP" id="nomorKTPEdit">
                </div>
                <div class="form-group">
                    <label for="tel">Nomor Telepon</label>
                    <input type="tel" class="form-control" name="tel" id="telEdit">
                </div>
                <div class="form-group">
                  <label for="ttl">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="ttl" id="ttlEdit">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamatEdit">
                </div>
                <div class="form-group">
                  <label for="keahlian">Keahlian</label>
                  <input type="text" class="form-control" name="keahlian" id="keahlianEdit">
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <input type="text" class="form-control" name="agama" id="agamaEdit">
                </div>
                <div class="form-group">
                  <label for="rating">Rating</label>
                  <input type="number" class="form-control" name="rating" id="ratingEdit">
                </div>
                <div class="form-group">
                  <label for="fotoDiri">Foto Diri</label>
                  <input type="file" name="fotoDiri" id="fotoDiriEdit" class="form-control">
                </div>
                <div class="form-group">
                  <label for="fotoKTP">Foto KTP</label>
                  <input type="file" name="fotoKTP" id="fotoKTPEdit" class="form-control">
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
{{-- End Of Modal Edit --}}

{{-- Delete Modal --}}
<div class="modal modal-danger fade" id="deleteModalPekerja" tabindex="-1" role="dialog" aria-labelledby="deleteModalPekerjaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalPekerjaLabel">Konfirmasi Hapus Pekerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.delete-pekerja')}}" method="post">
          {{csrf_field()}}
          <div class="modal-body">
              <h5 class="text-center"> Yakin akan menghapus pekerja ini?</h5>
              <input type="hidden" name="id" id="idDelete" value="">
          </div>
          <div class="modal-footer">
              <button button type="button" class="btn btn-secondary">Tidak</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
      </form>
    </div>
  </div>
</div>
{{-- End Of Delete Modal --}}
</div>

@endsection