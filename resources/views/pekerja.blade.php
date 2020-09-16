@extends('layouts.master-pekerja')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($pekerja['status'] == 'resign')
                <br>
                <div class="text-center">
                    <h2>Anda Telah Resign</h2>
                    <p>Silahkan Hubungi Admin Untuk Melakukan Aktivasi Akun</p>
                </div>
            @else
            <div class="card">
                <div class="card-header">Pekerja Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    PEKERJA DASHBOARD
                </div>
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
