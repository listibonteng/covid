<?php

namespace App\Models;
use\App\Models\Kelurahan;
use\App\Models\Kasus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $fillable = ['nama','rw', 'id_kelurahan'];
    public $timestamps = true;

    public function kasus(){
        return $this->hasMany('App\Models\Kasus', 'id_rw');
    }

    public function kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan', 'id_kelurahan');
}
use HasFactory;
}
