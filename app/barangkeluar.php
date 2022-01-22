<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangkeluar extends Model
{
    protected $table = 'barang_keluar';

    public function pengiriman_pesanan_header(){
        return $this->belongsTo('App\pengiriman_pesanan_header','id_pengiriman_pesanan_header','id');
    }

    public function retur_pembelian(){
        return $this->belongsTo('App\returPembelian','id_return_pembelian','id');
    }
}
