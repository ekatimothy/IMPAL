<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_history extends Model
{
    //
    protected $primaryKey = 'kode_transaksi';
    protected $table = 'history'; //awalnya supply
    public $timestamps = false;
    public $incrementing = true;
    
    protected $fillable = [
        'nm_barang', 'kode_barang','jumlah',
    ];
}
