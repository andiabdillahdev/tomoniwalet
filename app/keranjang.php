<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'tb_keranjang';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}