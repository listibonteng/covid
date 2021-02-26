@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('TAMBAH DATA KELURAHAN') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kelurahan.store')}}" method='post'>
  @csrf
    <div class="form-group">
      <label >Nama Kecamatan :</label>
      <select name="id_kecamatan" class="form-control" required>
      @foreach($kecamatan as $data)
      <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
      @endforeach
      </select>
    </div>

    
    <div class="form-group">
      <label >Nama Kelurahan :</label>
      <input type="text" class="form-control" name="nama_kelurahan" value="{{@old('nama_kelurahan')}}">
      @error('nama_kelurahan')
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
