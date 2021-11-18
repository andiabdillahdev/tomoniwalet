<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    protected $table = 'barang_masuk';

    public function pesanan_pembelian_header(){
        return $this->belongsTo('App\pesanan_pembelian_header','id_pesanan_pembelian_header','id');
    }
}
