<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retail_penjualan_detail extends Model
{
    protected $table = 'tb_retail_penjualan_detail';
    protected $with = ['produk'];

    public function retail_penjualan_header(){
        return $this->belongsTo('App\retail_penjualan_header','id_retail_penjualan_header');
    }

    public function produk()
    {
        return $this->belongsTo('App\produk', 'id_produk');
    }

}
