<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provinsi;
use App\Models\Kasus;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function index()
    {
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

    $res = [
        'success'          => true,
        'Jumlah Positif'   => $positif,
        'Jumlah Sembuh'    => $sembuh,
        'Jumlah Meninggal' => $meninggal,
        'message'          => 'Data Provinsi Ditampilkan'
        ];
        return response()->json($res,200);

    }

    public function provinsi($id)
    {
    $tampil = DB::table('provinsis')
            
            ->join('kotas','kotas.id_provinsi','=','provinsis.id')
            ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('kasuses','kasuses.id_rw','=','rws.id')
            ->where('provinsis.id',$id)
            ->select('nama_provinsi',
                        DB::raw('sum(kasuses.positif) as positif'),
                        DB::raw('sum(kasuses.sembuh) as sembuh'),
                        DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->groupBy('nama_provinsi')
            ->get();

            $res = [
                'success'          => true,
                'Provinsi'         => $tampil,
                'message'          => 'Data Provinsi Ditampilkan'
                ];
                return response()->json($res,200);

    }

    public function indonesia()
    {
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

            $res = [
                'success'          => true,
                'Provinsi'         => $tampil,
                'message'          => 'Data Provinsi Ditampilkan'
                ];
                return response()->json($res,200);
    }

    //tampil Kota
    public function kota()
    {
    $tampil = DB::table('kotas')
            ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('kasuses','kasuses.id_rw','=','rws.id')
            ->select('nama_kota',
                        DB::raw('sum(kasuses.positif) as positif'),
                        DB::raw('sum(kasuses.sembuh) as sembuh'),
                        DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->groupBy('nama_kota')
            ->get();

            $res = [
                'success'          => true,
                'kota'             => $tampil,
                'message'          => 'Data kota Ditampilkan'
                ];
                return response()->json($res,200);

    }

    //tampil Kecamatan
    public function kecamatan()
    {
    $tampil = DB::table('kecamatans')
            ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('kasuses','kasuses.id_rw','=','rws.id')
            ->select('nama_kecamatan',
                        DB::raw('sum(kasuses.positif) as positif'),
                        DB::raw('sum(kasuses.sembuh) as sembuh'),
                        DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->groupBy('nama_kecamatan')
            ->get();

            $res = [
                'success'          => true,
                'kecamatan'         => $tampil,
                'message'          => 'Data kecamatan Ditampilkan'
                ];
                return response()->json($res,200);

    }

    //tampil kelurahan
    public function kelurahan()
    {
    $tampil = DB::table('kelurahans')
            ->join('rws','rws.id_kelurahan','=','kelurahans.id')
            ->join('kasuses','kasuses.id_rw','=','rws.id')
            ->select('nama_kelurahan',
                        DB::raw('sum(kasuses.positif) as positif'),
                        DB::raw('sum(kasuses.sembuh) as sembuh'),
                        DB::raw('sum(kasuses.meninggal) as meninggal'))
            ->groupBy('nama_kelurahan')
            ->get();

            $res = [
                'success'          => true,
                'kelurahan'         => $tampil,
                'message'          => 'Data kelurahan Ditampilkan'
                ];
                return response()->json($res,200);

    }
        //Data Perhari
    public function tanggal(){

        $kasus = Kasus::get('created_at')->last();
        $positif = Kasus::where('tanggal', date('Y-m-d'))->sum('positif');
        $sembuh = Kasus::where('tanggal', date('Y-m-d'))->sum('sembuh');
        $meninggal = Kasus::where('tanggal', date('Y-m-d'))->sum('meninggal');

        $join = DB::table('kasuses')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'kasuses.id_rw', '=', 'rws.id')
                    ->get();
        $data1 = [
            'positif' =>$join->sum('positif'),
            'sembuh' =>$join->sum('sembuh'),
            'meninggal' =>$join->sum('meninggal'),
        ];
        $data2 = [
            'positif' =>$positif,
            'sembuh' =>$sembuh,
            'meninggal' =>$meninggal,
        ];
        $res = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $data2,
                'total' => $data1
            ],
            'message' => 'Berhasil'
        ];
        
        return response()->json($res, 200);
    }

    public $data = [];
    public function global()
    {
        $response = Http::get('https://api.kawalcorona.com')->json();
        foreach ($response as $data => $val) {
        $raw = $val['attributes'];
        $res = [
            'Negara' => $raw['Country_Region'],
            'Positif' => $raw['Confirmed'],
            'Sembuh' => $raw['Recovered'],
            'Meninggal' => $raw['Deaths']
        ];
        array_push($this->data, $res);
    }
    $data = [
        'Succes' => true,
        'Data' => $this->data,
        'Message' => 'Berhasil'
    ];
    return response()->json($data,200);
    }

    public function Indonesia2(){
        $positif = DB::table('kasuses')
                ->sum('kasuses.positif');

        $sembuh = DB::table('kasuses')
                ->sum('kasuses.sembuh');

        $meninggal = DB::table('kasuses')
                ->sum('kasuses.meninggal');

        return response([
            'Success' => true,
            'Data' => [
            'Name' => 'Indonesia',
            'Positif'=> $positif,
            'Sembuh'=> $sembuh,
            'Meninggal'=> $meninggal,
            ],
        'Message' => ' Berhasil!',
        ]);
    }
    
    public function store(Request $request)
    {
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
