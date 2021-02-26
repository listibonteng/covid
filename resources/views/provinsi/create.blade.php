@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" >{{ __('TAMBAH DATA PROVINSI') }}
        </div>
          <div class="card-body">
           
  <form action=" {{route('provinsi.store')}}" method='post'>
  @csrf
    <div class="form-group">
      <label >Kode Provinsi</label>
      <input type="text" class="form-control" name="kode_provinsi" value="{{@old('kode_provinsi')}}">
      @error('kode_provinsi')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label >Nama Provinsi:</label>
      <input type="text" class="form-control " name="nama_provinsi" value="{{@old('nama_provinsi')}}">
      @error('nama_provinsi')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
<button type="submit" class="btn float btn btn-outline-primary">Tambah</button>
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
