@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('SHOW DATA KASUS') }}</div>

                <div class="card-body">
                   <div class="form-group">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Provinsi</label>
                        <input type="text" name="nama_provinsi"  value="{{$kasus->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" class="form-control" id="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kota</label>
                        <input type="text" name="nama_kota"  value="{{$kasus->rw->kelurahan->kecamatan->kota->nama_kota}}" class="form-control" id="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kecamatan</label>
                        <input type="text" name="nama_kecamatan"  value="{{$kasus->rw->kelurahan->kecamatan->nama_kecamatan}}" class="form-control" id="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kelurahan</label>
                        <input type="text" name="nama_kelurahan"  value="{{$kasus->rw->kelurahan->nama_kelurahan}}" class="form-control" id="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Rw</label>
                        <input type="text" name="rw"  value="{{$kasus->rw->rw}}" class="form-control" id="" readonly>
                    </div>

                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Jumlah Positif</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="positif"
                        value="{{$kasus->positif}}" readonly>
                    </div>

                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Jumlah Sembuh</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sembuh"
                        value="{{$kasus->sembuh}}" readonly>
                    </div>

                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Jumlah Meninggal</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="meninggal"
                        value="{{$kasus->meninggal}}" readonly>
                    </div>

                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal"
                        value="{{$kasus->tanggal}}" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-default"> <a href= "{{url()->previous() }}" >Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection