@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('TAMBAH DATA RW') }}</div>
          <div class="card-body">
           
  <form action=" {{route('rw.store')}}" method='post'>
  @csrf
    <div class="form-group">
      <label >Nama Kelurahan :</label>
      <select name="id_kelurahan" class="form-control" required>
      @foreach($kelurahan as $data)
      <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
      @endforeach
      </select>
    </div>



    <div class="form-group">
      <label >RW :</label>
      <input type="text" class="form-control" name="rw" value="{{@old('rw')}}">
      @error('rw')
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
