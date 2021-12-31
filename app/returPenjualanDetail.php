<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returPenjualanDetail extends Model
{
    protected $table = 'tb_retur_penjualan_detail';
    protected $with = ['produk'];

    public function returPenjualanHeader()
    {
        return $this->belongsTo('App\returPenjualanHeader', 'id_retur_penjualan_header');
    }

    public function produk()
    {
        return $this->belongsTo('App\produk', 'id_produk');
    }
}
