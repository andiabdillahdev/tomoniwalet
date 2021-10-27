<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan_pembelian_detail extends Model
{
    protected $table = 'pesanan_pembelian_detail';
    protected $with = ['produk'];
    public function pesanan_pembelian_header()
    {
        return $this->belongsTo('App\pesanan_pembelian_header', 'id_pesanan_pembelian_header');
    }

    public function produk()
    {
        return $this->belongsTo('App\produk', 'id_produk');
    }
}
