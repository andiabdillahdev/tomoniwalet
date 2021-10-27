<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produks';

    public function kategori(){
        return $this->belongsTo('App\kategori', 'kategori_id', 'id');
    }

    public function gambar_detail(){
        return $this->hasMany('App\gambar_detail', 'id_produk', 'id');
    }

    public function pesanan_pembelian_detail(){
        return $this->hasMany('App\pesanan_pembelian_detail', 'id_produk', 'id');
    }
}
