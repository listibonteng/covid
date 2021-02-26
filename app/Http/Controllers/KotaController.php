<?php

namespace App\Http\Controllers;
use App\Http\Controller\DB;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('kota.index', compact('kota'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('kota.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'kode_kota' => 'required|max:4|unique:kotas',
            'nama_kota' => 'required|unique:kotas',
        ],
        [
            'kode_kota.required' => 'Kode Harus di Isi',
            'kode_kota.max' => 'Kode Maksimal 4 Nomer',
            'kode_kota.unique' => 'Kode Sudah Dipakai',
            'nama_kota.required' => 'Nama Kota Harus di Isi',
            'nama_kota.unique' => 'Nama Kota Sudah Dipakai',
        ]);
        $kota = new Kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
        ->with(['message'=>'Data Berhasil ditambahkan']);
    }

    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('kota.show',compact('kota'));
    }

    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('kota.edit',compact('kota','provinsi'));
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index');
    }
    
}
