<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produks';

    public function kategori()
    {
        return $this->belongsTo('App\kategori', 'kategori_id', 'id');
    }

    public function gambar_detail()
    {
        return $this->hasMany('App\gambar_detail', 'id_produk', 'id');
    }

    public function pesanan_pembelian_detail()
    {
        return $this->hasMany('App\pesanan_pembelian_detail', 'id_produk', 'id');
    }

    public function returPembelianDetail()
    {
        return $this->hasMany('App\returPembelianDetail', 'id_produk', 'id');
    }

    public function returPenjualanDetail()
    {
        return $this->hasMany('App\returPenjualanDetail', 'id_produk', 'id');
    }

    public function pengiriman_pesanan_detail()
    {
        return $this->hasMany('App\pengiriman_pesanan_detail', 'id_produk', 'id');
    }

    public function retail_penjualan_detail()
    {
        return $this->hasMany('App\retail_penjualan_detail', 'id_produk', 'id');
    }

    public function stok()
    {
        return $this->hasOne('App\stok', 'id_produk', 'id');
    }

    public function keranjang()
    {
        return $this->hasMany('App\keranjang');
    }
}
