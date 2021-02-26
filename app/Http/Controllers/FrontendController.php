<?php

namespace App\Http\Controllers;
use App\Models\Countri;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

    $positif = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.positif');

    $sembuh = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.sembuh');

    $meninggal = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.meninggal');

    $tampil = DB::table('provinsis')
            ->join('kotas','kotas.id_provinsi','=','provinsis.id')
            ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('kasuses','kasuses.id_rw','=','rws.id')
            ->select('nama_provinsi',
                        DB::raw('sum(kasuses.positif) as positif'),
                        DB::raw('sum(kasuses.sembuh) as sembuh'),
                        DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->groupBy('nama_provinsi')
            ->get();
        return view('frontend.welcome', compact('positif','sembuh','meninggal','tampil'));


    }

    

    
}
