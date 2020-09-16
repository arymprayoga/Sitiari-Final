@extends('layouts.master-pekerja')

@section('content')
<br>
<form action="{{route('pekerja.resign')}}" method="post">
    {{csrf_field()}}
<div class="row">
    <div class="col-12 text-center">
        <h2>Apakah anda yakin untuk melakukan resign?</h2>
        <br>
        <p >1. Anda hanya bisa melakukan resign setelah semua pekerjaan anda telah selesai</p>
        <p>2. Setelah permohonan resign disetujui, akun anda tidak akan muncul di halaman pemesanan</p>
        <p>2. Setelah permohonan resign disetujui, silahkan hubungi pihak sitiari untuk mengaktifkan akun kembali</p>
        <br>
        <button class="btn btn-danger" type="submit">Ajukan Permohonan Resign</button>
    </div>
</div>
</form>

@endsection