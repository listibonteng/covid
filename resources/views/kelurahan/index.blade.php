@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('DATA KELURAHAN') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
<div align='right'>
<a href="{{route('kelurahan.create')}}" class="float-right btn btn-outline-primary">Tambah Data(+)</a>
</div> 

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> No </th>
        <th scope="col"> Nama Kelurahan </th>
        <th scope="col"> Kecamatan </th>
        <th scope="col"> Action </th>
      </tr>
    </thead>

    <tbody>
    @php $no = 1; @endphp
    @foreach($kelurahan as $data)
      <tr>
        <th scope='row'>{{ $no++ }}</th>
        <th>{{ $data->nama_kelurahan }}</th>
        <th>{{ $data->kecamatan->nama_kecamatan}}</th>
        <th>
        <div>
                <form action="{{route('kelurahan.destroy', $data->id)}}" method='post'>
                <a href="{{ route('kelurahan.show', $data->id)}}" method='post' class="float btn btn-outline-warning">Show</a>
                @csrf
                <a href="{{ route('kelurahan.edit', $data->id)}}" class="float btn btn-outline-danger">Edit</a>
                @method('DELETE')
                <button type='submit' onclick="return comfirm('Apakah anda yakin?');" class='float btn btn-outline-success'>hapus</button>
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
