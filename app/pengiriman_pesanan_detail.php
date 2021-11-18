<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman_pesanan_detail extends Model
{
    protected $table = 'pengiriman_pesanan_detail';
    protected $with = ['produk'];

    public function pengiriman_pesanan_header()
    {
        return $this->belongsTo('App\pengiriman_pesanan_header', 'id_pengiriman_pesanan_header');
    }

    public function produk()
    {
        return $this->belongsTo('App\produk', 'id_produk');
    }
}
