<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'kode', 'nama'
    ];

    public function pesanan_pembelian_header(){
        return $this->hasMany('App\pesanan_pembelian_header', 'id_supplier', 'id');
    }

    public function returPembelian(){
        return $this->hasMany('App\returPembelian', 'id_supplier', 'id');
    }

}
