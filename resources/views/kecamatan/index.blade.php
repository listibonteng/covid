@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card">
        <div class="card-header">{{ __('DATA KECAMATAN') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
<div align='right'>
  <a href="{{route('kecamatan.create')}}" class="float-right btn btn-outline-primary">Tambah Data(+)</a>
</div> 

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> No </th>
        <th scope="col"> kode Kecamatan </th>
        <th scope="col"> Nama Kecamatan </th>
        <th scope="col"> Kota </th>
        <th scope="col"> Action </th>
      </tr>
    </thead>

    <tbody>
    @php $no = 1; @endphp
    @foreach($kecamatan as $data)
      <tr>
        <th scope='row'>{{ $no++ }}</th>
        <th>{{ $data->kode_kecamatan }}</th>
        <th>{{ $data->nama_kecamatan }}</th>
        <th>{{ $data->kota->nama_kota}}</th>
        <th>
        <div>
                <form action="{{route('kecamatan.destroy', $data->id)}}" method='post'>
                <a href="{{ route('kecamatan.show', $data->id)}}" method='post' class="float btn btn-outline-warning">Show</a>
                @csrf
                <a href="{{ route('kecamatan.edit', $data->id)}}" class="float btn btn-outline-danger">Edit</a>
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
