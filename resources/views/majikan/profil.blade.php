@extends('layouts.master-majikan')

@section('content')

<form action="{{route('user.edit-majikan')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="modal-body">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id" id="id">
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" readonly class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" readonly class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" readonly class="form-control" name="status" id="status">
        </div>
        <div class="form-group">
            <label for="noKTP">Nomor KTP</label>
            <input type="number" readonly class="form-control" name="nomorKTP" id="noKTP">
        </div>
        <div class="form-group">
            <label for="tel">Nomor Telepon</label>
            <input type="tel" readonly class="form-control" name="tel" id="tel" value="{{$majikan->detailMajikan->fotoDiri}}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
        <input type="text" readonly class="form-control" name="alamat" id="alamat" value="{{$majikan->detailMajikan->alamat}}">
        </div>
        <div class="form-group">
            <label for="fotoDiri">Foto Diri</label>
        <img id="fotoDiri" class="" style="" src="/storage/img/profile/1575123540.png" alt="">
        </div>
        <div class="form-group">
            <label for="fotoKTP">Foto KTP</label>
            <img id="fotoKTP" class="img-fluid" src="" alt="">
        </div>
    </div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
  <button type="submit" class="btn btn-primary">Edit</button>
</div>
</form>

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

@endsection