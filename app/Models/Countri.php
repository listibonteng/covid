<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countri extends Model
{
    protected $fillable = ['kode_countri','nama_countri'];
    public $timestamps = true;

    public function kasus2(){
        return $this->hasMany('App\Kasus2', 'id_countri');
    }
}
