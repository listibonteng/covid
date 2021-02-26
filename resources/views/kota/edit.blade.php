@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('EDIT DATA KOTA') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kota.update', $kota->id)}}" method='post'>
  <input type="hidden" name="_method" value="put">
  @csrf
  @method('PATCH')
  <div class="form-group">
      <label >Nama Provinsi :</label>
      <select name="id_provinsi" class="form-control" required>
      @foreach($provinsi as $data)
      <option value="{{$data->id}}"
      {{$data->id == $kota->id_provinsi ? "selected" : ""}}>
      {{$data->nama_provinsi}}
      </option>
      @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >Kode Kota</label>
      <input type="text" class="form-control" name="kode_kota" value="{{$kota->kode_kota}}" required>
    </div>
    <div class="form-group">
      <label >Nama Kota</label>
      <input type="text" class="form-control" name="nama_kota" value="{{$kota->nama_kota}}" required>
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
