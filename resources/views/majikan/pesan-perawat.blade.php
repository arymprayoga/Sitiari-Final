@extends('layouts.master-majikan')

@section('content')
<div class="container">
    <br>
    <h3 style="font-weight:900;" class="pb-2">Pesan Perawat Lansia</h3>
    <div class="row">
        @foreach ($perawat as $item)
        <div class="col-md-3">
            <form id="pemesanan" onsubmit="return submitForm();">
            <div class="card">
                <img src="../storage/img/profile/{{$item->detailPekerja->fotoDiri}}" class="card-img-top">
                <div class="card-body">
                    <input type="hidden" id="id_pekerja" name="id_pekerja" value="{{$item->id}}">
                    <input type="hidden" id="jumlahBayar" name="jumlahBayar" value="{{$item->gaji}}">
                    @php
                        $id_majikan = Auth::user()->id;
                    @endphp
                    <input type="hidden" id="id_majikan" name="id_majikan" value="{{$id_majikan}}">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <p class="card-text">Usia : {{$item->detailPekerja->ttl}}</p>
                    <p class="card-text">Alamat : {{$item->detailPekerja->alamat}}</p>
                    <p class="card-text">Agama : {{$item->detailPekerja->agama}}</p>
                    <p class="card-text">Gaji : {{$item->gaji}}</p>
                    <p class="card-text">Keahlian : {{$item->detailPekerja->keahlian}}</p>
                    @php $rating = $item->detailPekerja->rating; @endphp  

                    @foreach(range(1,5) as $i)
                        <span class="fa-stack" style="width:20px">
                        <i class="far fa-star fa-stack-1x" style="color:gold;"></i>

                        @if($rating >0)
                            @if($rating >0.5)
                                <i class="fas fa-star fa-stack-1x" style="color:gold;"></i>
                            @else
                                <i class="fas fa-star-half fa-stack-1x" style="color:gold;"></i>
                            @endif
                        @endif
                        @php $rating--; @endphp
                        </span>
                    @endforeach
                    <br>
                    <button id="submit" class="btn btn-success">Pesan</button>
                </div>
            </div> 
            </form>              
        </div>     
        @endforeach       
    </div>
    {{$perawat->links()}}
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
            kategori: 1,
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
        return false;
    }
    </script>
@endsection