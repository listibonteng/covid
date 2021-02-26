<?php

namespace App\Http\Controllers;
use App\Http\Controller\DB;
use App\Models\Kasus;
use App\Models\Provinsi;
use App\Models\Rw;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $kasus = Kasus::with('rw')->get();
        return view('kasus.index', compact('kasus'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('kasus.create', compact('rw'));
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'positif' => 'required|max:6|unique:kasuses',
            'sembuh' => 'required|max:6|unique:kasuses',
            'meninggal' => 'required|max:6|unique:kasuses',
            'tanggal' => 'required|unique:kasuses',
        ],
        [
            'positif.required' => 'Jumlah Harus di Isi',
            'positif.max' => 'Jumlah Maksimal 6 Nomer',

            'sembuh.required' => 'Jumlah Harus di Isi',
            'sembuh.max' => 'Jumlah Maksimal 6 Nomer',

            'meninggal.required' => 'Jumlah Harus di Isi',
            'meninggal.max' => 'Jumlah Maksimal 6 Nomer',

            'tanggal.required' => 'Tanggal Harus di Isi',
        ]);
        $kasus = new Kasus;
        $kasus->id_rw = $request->id_rw;
        $kasus->positif = $request->positif;
        $kasus->sembuh = $request->sembuh;
        $kasus->meninggal = $request->meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index');
    }

    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('kasus.show',compact('kasus'));
    }

    public function edit($id)
    {
        $rw = Rw::all();
        $kasus = Kasus::findOrFail($id);
        return view('kasus.edit',compact('kasus','rw'));
    }

    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->positif = $request->positif;
        $kasus->sembuh = $request->sembuh;
        $kasus->meninggal = $request->meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id)->delete();
        return redirect()->route('kasus.index');
    }
}
