<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan_pembelian_header extends Model
{
    protected $table = 'pesanan_pembelian_header';

    public function pesanan_pembelian_detail(){
        return $this->hasMany('App\pesanan_pembelian_detail', 'id_pesanan_pembelian_header', 'id');
    }

    public function barangmasuk(){
        return $this->hasMany('App\barangmasuk', 'id_pesanan_pembelian_header', 'id');
    }

    public function supplier(){
        return $this->belongsTo('App\supplier', 'id_supplier', 'id');
    }
}
