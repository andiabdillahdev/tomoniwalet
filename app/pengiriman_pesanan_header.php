<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman_pesanan_header extends Model
{
    protected $table = 'pengiriman_pesanan_header';

    public function pengiriman_pesanan_detail(){
        return $this->hasMany('App\pengiriman_pesanan_detail', 'id_pengiriman_pesanan_header', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function barangkeluar(){
        return $this->hasMany('App\barangkeluar', 'id_pesanan_pembelian_header', 'id');
    }
}
