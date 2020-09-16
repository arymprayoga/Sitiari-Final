@extends('layouts.master-admin')

@section('content')
<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModalMajikan">
    Tambah Majikan
</button>
<br><br>
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
                  {{-- {{$data[0]['detail_majikan']['alamat']}} --}}
                  {{-- {{ $total[0]['detail_majikan'][0]['id'] }} --}}
                  {{-- {{$total = $majikan[0]['detail_majikan']['alamat']}} --}}
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
                    <button class="btn btn-info" data-toggle="modal" data-id="{{$item->id}}" data-name="{{$item->name}}"
                        data-email="{{$item->email}}" data-status="{{$item->status}}" data-noktp="{{$item->detailMajikan->nomorKTP}}" 
                        data-tel="{{$item->detailMajikan->tel}}" data-alamat="{{$item->detailMajikan->alamat}}" 
                        data-tanggalmasuk="{{$item->detailMajikan->tanggalMasuk}}" data-fotodiri="{{$item->detailMajikan->fotoDiri}}" 
                        data-fotoktp="{{$item->detailMajikan->fotoKTP}}" data-target="#editModalMajikan">Edit</button>
                             / 
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModalMajikan" data-id="{{$item->id}}">Hapus</button>                      
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

    <!-- Modal Add -->
    <div class="modal fade" id="addModalMajikan" tabindex="-1" role="dialog" aria-labelledby="addModalMajikanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalMajikanLabel">Tambah Majikan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <form action="{{route('user.tambah-majikan')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" required id="nameAdd">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required id="emailAdd">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" required name="password" id="passwordAdd">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="statusAdd" class="form-control">
                            <option>aktif</option>
                            <option>nonaktif</option>
                            <option>blacklist</option>
                        </select>
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
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" required name="alamat" id="alamatAdd">
                    </div>
                    <div class="form-group">
                        <label for="fotoDiri">Foto Diri</label>
                        <input type="file" name="fotoDiri" required id="fotoDiriAdd" class="form-control">
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editModalMajikan" tabindex="-1" role="dialog" aria-labelledby="editModalMajikanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalMajikanLabel">Edit Majikan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <form action="{{route('user.edit-majikan')}}" method="post" enctype="multipart/form-data">
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
                            <option>aktif</option>
                            <option>nonaktif</option>
                            <option>blacklist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="noKTP">Nomor KTP</label>
                        <input type="number" class="form-control" name="nomorKTP" id="noKTPEdit">
                    </div>
                    <div class="form-group">
                        <label for="tel">Nomor Telepon</label>
                        <input type="tel" class="form-control" name="tel" id="telEdit">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamatEdit">
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
  <div class="modal modal-danger fade" id="deleteModalMajikan" tabindex="-1" role="dialog" aria-labelledby="deleteModalMajikanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalMajikanLabel">Konfirmasi Hapus Majikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user.delete-majikan')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center"> Yakin akan menghapus majikan ini?</h5>
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