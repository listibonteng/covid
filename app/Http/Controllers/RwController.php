<?php

namespace App\Http\Controllers;
use App\Http\Controller\DB;
use App\Models\Rw;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('rw.index', compact('rw'));
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('rw.create', compact('kelurahan'));
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'rw' => 'required|max:4|unique:rws',
        ],
        [
            'rw.required' => 'Rw Harus di Isi',
            'rw.max' => 'Rw Maksimal 4 Nomer',
            'rw.unique' => 'Rw Sudah Dipakai',
        ]);
        $rw = new Rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->rw = $request->rw;
        $rw->save();
        return redirect()->route('rw.index');
    }

    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('rw.show',compact('rw'));
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('rw.edit',compact('rw','kelurahan'));
    }

    public function update(Request $request, $id)
    {
        $rw = rw::findOrFail($id);
        $rw->rw = $request->rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index');
    }
}
