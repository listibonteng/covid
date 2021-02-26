@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('SHOW DATA KELURAHAN') }}</div>

                <div class="card-body">
                   <div class="form-group">
                     </div>

                     <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input type="text" name="id_kecamatan" class="form-control" value="{{$kelurahan->kecamatan->nama_kecamatan}}" readonly>
                    </div>

 

                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kelurahan"
                        value="{{$kelurahan->nama_kelurahan}}" readonly>
                    </div>
                     </div>
                </div>
                <button type="submit" class="btn btn-default"> <a href= "{{url()->previous() }}" >Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection