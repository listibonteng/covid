@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('EDIT DATA KELURAHAN') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kelurahan.update', $kelurahan->id)}}" method='post'>
  <input type="hidden" name="_method" value="put">
  @csrf
  @method('PATCH')
  <div class="form-group">
      <label >Nama Kecamatan :</label>
      <select name="id_kecamatan" class="form-control" required>
      @foreach($kecamatan as $data)
      <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
      @endforeach
      </select>
    </div>

    
    <div class="form-group">
      <label >Kelurahan</label>
      <input type="text" class="form-control" name="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" required>
    </div>
    <button type="submit" class="btn btn-default"> <a href= "{{url()->previous() }}" >edit</a></button>
  </form>
</div>

</body>
</html>


</div>
</div>
            </div>
        </div>                
                
@endsection
