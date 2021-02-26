@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('SHOW DATA RW') }}</div>

                <div class="card-body">
                   <div class="form-group">
                     </div>

                     <div class="form-group">
                        <label for="">Kelurahan</label>
                        <input type="text" name="id_kelurahan" class="form-control" value="{{$rw->kelurahan->nama_kelurahan}}" readonly>
                    </div>

                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">RW</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="rw"
                        value="{{$rw->rw}}" readonly>
                    </div>

                 
                </div>
                <button type="submit" class="btn btn-default"> <a href= "{{url()->previous() }}" >Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection