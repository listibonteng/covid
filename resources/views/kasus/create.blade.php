@extends('layouts.master')
<div class="container">
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('TAMBAH DATA KASUS') }}</div>
          <div class="card-body">
           
  <form action=" {{route('kasus.store')}}" method='post'>
  @csrf
  @livewireScripts
    @livewire('dropdowns')
  @livewireStyles
    <div class="form-group">
      <label >Jumlah Positif :</label>
      <input type="number" class="form-control" name="positif" value="{{@old('positif')}}">
      @error('positif')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label >Jumlah Sembuh :</label>
      <input type="number" class="form-control" name="sembuh" value="{{@old('sembuh')}}">
      @error('sembuh')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label >Jumlah Meninggal :</label>
      <input type="number" class="form-control" name="meninggal" value="{{@old('meninggal')}}">
      @error('meninggal')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label >Tanggal :</label>
      <input type="date" class="form-control" name="tanggal" required>
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


