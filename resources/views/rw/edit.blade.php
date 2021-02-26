@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('EDIT DATA RW') }}</div>
          <div class="card-body">
           
  <form action=" {{route('rw.update', $rw->id)}}" method='post'>
  <input type="hidden" name="_method" value="put">
  @csrf
  @method('PATCH')
  <div class="form-group">
      <label >Nama Kelurahan :</label>
      <select name="id_kelurahan" class="form-control" required>
      @foreach($kelurahan as $data)
      <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
      @endforeach
      </select>
    </div>

    <div class="form-group">
      <label >RW</label>
      <input type="text" class="form-control" name="rw" value="{{$rw->rw}}" required>
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
