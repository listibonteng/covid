<?php

namespace App\Models;
use App\Models\Kota;
use App\models\Kecamatan;
use App\models\Kelurahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public function kelurahan(){
        return $this->hasMany('App\Models\Kelurahan', 'id_kecamatan');
    }

    public function kota(){
        return $this->belongsTo('App\Models\Kota', 'id_kota');
    }
    use HasFactory;
}
