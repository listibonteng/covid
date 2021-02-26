@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('EDIT DATA PROVINSI') }}</div>
          <div class="card-body">
           
  <form action=" {{route('provinsi.update', $provinsi->id)}}" method='post'>
  <input type="hidden" name="_method" value="put">
  @csrf
  @method('PATCH')
  <div class="form-group">
      <label >Kode Provinsi</label>
      <input type="text" class="form-control" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" required>
    </div>
    <div class="form-group">
      <label >Nama Provinsi</label>
      <input type="text" class="form-control" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" required>
    </div>
    <button type="submit" class="btn btn-default"> <a href= "{{url()->previous() }}" >Edit</a></button>
  </form>
</div>
<button type="submit" class="btn btn-default" > <a href= "{{url()->previous() }}" >Kembali</a></button>


</body>
</html>


</div>
</div>
            </div>
        </div>                
                
@endsection
