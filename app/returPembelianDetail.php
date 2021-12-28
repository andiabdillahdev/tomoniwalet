<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returPembelianDetail extends Model
{
    protected $table = 'tb_retur_pembelian_detail';
    protected $with = ['produk'];

    public function returPembelian()
    {
        return $this->belongsTo('App\returPembelian', 'id_retur_pembelian_header');
    }

    public function produk()
    {
        return $this->belongsTo('App\produk', 'id_produk');
    }

}
