@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card">
        <div class="card-header">{{ __('DATA KOTA') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
<div align='right'>
  <a href="{{route('kota.create')}}" class="float-right btn btn-outline-primary">Tambah Data(+)</a>
</div> 

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> No </th>
        <th scope="col"> kode Kota </th>
        <th scope="col"> Nama Kota </th>
        <th scope="col"> Provinsi </th>
        <th scope="col"> Action </th>
      </tr>
    </thead>

    <tbody>
    @php $no = 1; @endphp
    @foreach($kota as $data)
      <tr>
        <th scope='row'>{{ $no++ }}</th>
        <th>{{ $data->kode_kota }}</th>
        <th>{{ $data->nama_kota }}</th>
        <th>{{ $data->provinsi->nama_provinsi}}</th>
        <th>
        <div>
                <form action="{{route('kota.destroy', $data->id)}}" method='post'>
                <a href="{{ route('kota.show', $data->id)}}" method='post' class="float btn btn-outline-warning">Show</a>
                @csrf
                <a href="{{ route('kota.edit', $data->id)}}" class="float btn btn-outline-danger">Edit</a>
                @method('DELETE')
                <button type='submit' class='float btn btn-outline-success'>hapus</button>
                </form>
            </div> 
        </th>
      </tr>
    </tbody>

    
        </td>
      </tr>
      @endforeach

  </table>
</div>
</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

                   
                
@endsection
