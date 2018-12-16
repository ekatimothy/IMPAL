<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_request extends Model
{
    //
    protected $primaryKey = 'kode_barang';
    protected $table = 'request';
    public $timestamps = false;
    public $incrementing = false;
}
