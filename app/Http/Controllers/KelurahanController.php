<?php

namespace App\Http\Controllers;
use App\Http\Controller\DB;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama_kelurahan' => 'required|unique:kelurahans',
        ],
        [
            'nama_kelurahan.required' => 'Nama Kelurahan Harus di Isi',
            'nama_kelurahan.unique' => 'Nama Kelurahan Sudah Dipakai',
        ]);
        $kelurahan = new Kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.show',compact('kelurahan'));
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.edit',compact('kelurahan','kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index');
    }
}
