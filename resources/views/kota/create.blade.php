@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('TAMBAH DATA KOTA') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kota.store')}}" method='post'>
  @csrf
    <div class="form-group">
      <label >Nama Provinsi :</label>
      <select name="id_provinsi" class="form-control" required>
      @foreach($provinsi as $data)
      <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
      @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >Kode Kota :</label>
      <input type="text" class="form-control" name="kode_kota" value="{{@old('kode_kota')}}">
      @error('kode_kota')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
      
    <div class="form-group">
      <label >Nama Kota :</label>
      <input type="text" class="form-control" name="nama_kota" value="{{@old('nama_kota')}}">
    </div>
      @error('nama_kota')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-outline-danger">Tambah</button>
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
