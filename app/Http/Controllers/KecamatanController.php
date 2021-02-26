<?php

namespace App\Http\Controllers;
use App\Http\Controller\DB;
use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    public function create()
    {
        $kota = Kota::all();
        return view('kecamatan.create', compact('kota'));
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'kode_kecamatan' => 'required|max:4|unique:kecamatans',
            'nama_kecamatan' => 'required|unique:kecamatans',
        ],
        [
            'kode_kota.required' => 'Kode Harus di Isi',
            'kode_kota.max' => 'Kode Maksimal 4 Nomer',
            'kode_kota.unique' => 'Kode Sudah Dipakai',
            'nama_kota.required' => 'Nama Kecamatan Harus di Isi',
            'nama_kota.unique' => 'Nama Kecamatan Sudah Dipakai',
        ]);
        $kecamatan = new Kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index');
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.show',compact('kecamatan'));
    }

    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.edit',compact('kecamatan','kota'));
    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index');
    }
}
