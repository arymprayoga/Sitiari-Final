@extends('layouts.master-majikan')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Perpanjang Pekerja</h3>
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
                <th>Perpanjang</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($perpanjang as $item)
                    <tr>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pesan}}</td>
                        <td>{{$item->status_pemesanan}}</td>
                        <form id="pemesanan" onsubmit="return submitForm();">
                        <td>
                            <button type="submit" class="btn btn-primary">Perpanjang</button>
                        </td>
                    </tr>
                <input type="hidden" name="id" id="id" value="{{$item->id}}">
                <input type="hidden" name="jumlahBayar" id="jumlahBayar" value="{{$item->pekerja->gaji}}">
                <input type="hidden" name="id_pekerja" id="id_pekerja" value="{{$item->pekerja_id}}">
                <input type="hidden" name="id_majikan" id="id_majikan" value="{{$item->majikan_id}}">
                </form>
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
  <script>
    function submitForm() {
        // Kirim request ajax
        $.post("{{ route('pemesanan.store') }}",
        {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            jumlahBayar: $('input#jumlahBayar').val(),
            id_pekerja: $('input#id_pekerja').val(),
            id_majikan: $('input#id_majikan').val(),
            kategori: 0,
        },
        function (data, status) {
            // console.log(data)
            // console.log(status)
            // console.log(data.snap_token)
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
                    location.reload();
                },
                // Optional
                onPending: function (result) {
                    location.reload();
                },
                // Optional
                onError: function (result) {
                    location.reload();
                }
            });
        });

        $.post("{{ route('majikan.perpanjang') }}", {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            id: $('input#id').val(),
        },
        function (data) {
        });
        return false;
    }
    </script>
@endsection