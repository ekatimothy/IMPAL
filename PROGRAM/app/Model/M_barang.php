<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_barang extends Model
{
    //
    protected $primaryKey = 'kode_barang';
    protected $table = 'supply'; //awalnya supply
    public $timestamps = false;
    public $incrementing = false;
}
