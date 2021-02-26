@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('EDIT DATA KECAMATAN') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kecamatan.update', $kecamatan->id)}}" method='post'>
  <input type="hidden" name="_method" value="put">
  @csrf
  @method('PATCH')
  <div class="form-group">
      <label >Nama Kota :</label>
      <select name="id_kota" class="form-control" required>
      @foreach($kota as $data)
      <option value="{{$data->id}}">{{$data->nama_kota}}</option>
      @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >Kode Kecamatan</label>
      <input type="text" class="form-control" name="kode_kecamatan" value="{{$kecamatan->kode_kecamatan}}" required>
    </div>
    <div class="form-group">
      <label >Kecamatan</label>
      <input type="text" class="form-control" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" required>
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
