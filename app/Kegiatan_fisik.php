<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan_fisik extends Model
{
    //
    protected $table = 'kegiatan_fisik';

    public function anggota()
    {
        return $this->belongsTo('App\anggota');
    }
}
