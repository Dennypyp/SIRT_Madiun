<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    //
    protected $table = 'anggota_kk';
    protected $fillable = ['nik','no_kk','nama','alamat'];
    protected $primaryKey = 'nik';
}
