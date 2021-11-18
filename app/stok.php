<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $table = 'stok_barang';

    public function produk(){
        return $this->belongsTo('App\produk','id_produk','id');
    }
}
