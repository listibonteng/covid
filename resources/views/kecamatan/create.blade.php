@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('TAMBAH DATA KECAMATAN') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kecamatan.store')}}" method='post'>
  @csrf
    <div class="form-group">
      <label >Nama kota :</label>
      <select name="id_kota" class="form-control" required>
      @foreach($kota as $data)
      <option value="{{$data->id}}">{{$data->nama_kota}}</option>
      @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >Kode Kecamatan :</label>
      <input type="text" class="form-control" name="kode_kecamatan" value="{{@old('kode_kecamatan')}}">
      @error('kode_kecamatan')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label >Nama Kecamatan :</label>
      <input type="text" class="form-control" name="nama_kecamatan" value="{{@old('nama_kecamatan')}}">
      @error('nama_kecamatan')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-default">Tambah</button>
  </form>
</div>

</body>
</html>


</div>
</div>
            </div>
        </div>                
                
@endsection
