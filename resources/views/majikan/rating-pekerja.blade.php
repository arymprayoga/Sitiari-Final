@extends('layouts.master-majikan')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Rating Pekerja</h3>
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
                <th>Rating</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                    <tr>
                        <td>{{$item->pekerja->name}}</td>
                        <td>{{$item->waktu_pesan}}</td>
                        <td>{{$item->status_pemesanan}}</td>
                        @if(!isset($item->rating))
                            <td>
                            <button class="btn btn-primary" data-toggle="modal" data-id-pekerja="{{$item->pekerja_id}}" data-id="{{$item->id}}" data-target="#ratingPekerjaModal">
                                Rating
                                </button>
                            </td>
                        @else
                        <td>{{$item->rating}}</td>
                        @endif
                    </tr>
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

  {{-- Rating Modal --}}
<div class="modal modal-danger fade" id="ratingPekerjaModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalPekerjaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ratingPekerjaModalLabel">Rating Pekerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('majikan.rating-pekerja')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center">Masukkan Rating</h5>
                <br><br>
                <div class="text-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                  </div>
                </div>
                <input type="hidden" name="id" id="idDelete" value="">
                <input type="hidden" name="pekerja_id" id="idPekerja" value="">
            </div>
            <div class="modal-footer">
                <button button type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Of Rating Modal --}}
@endsection