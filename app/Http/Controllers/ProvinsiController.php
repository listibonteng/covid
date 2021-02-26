<?php

namespace App\Http\Controllers;
use App\Http\Controller\DB;
use App\Models\Provinsi;

use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index', compact('provinsi'));
    }

    
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.create');
    }

    
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'kode_provinsi' => 'required|max:4|unique:provinsis',
            'nama_provinsi' => 'required|unique:provinsis',
        ],
        [
            'kode_provinsi.required' => 'Kode Harus di Isi',
            'kode_provinsi.max' => 'Kode Maksimal 4 Nomer',
            'kode_provinsi.unique' => 'Kode Sudah Dipakai',
            'nama_provinsi.required' => 'Nama Provinsi Harus di Isi',
            'nama_provinsi.unique' => 'Nama Sudah Dipakai',
        ]);
        $provinsi = new Provinsi;
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }


    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.show',compact('provinsi'));
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit',compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
        ->with(['message'=>'Data Berhasil diedit']);
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index');
    }
}
