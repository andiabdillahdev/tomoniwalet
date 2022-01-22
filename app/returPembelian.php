<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returPembelian extends Model
{
    protected $table = 'tb_retur_pembelian_header';
    protected $with = ['supplier','returPembelianDetail'];

    public function supplier(){
        return $this->belongsTo('App\supplier', 'id_supplier', 'id');
    }

    public function returPembelianDetail(){
        return $this->hasMany('App\returPembelianDetail', 'id_retur_pembelian_header', 'id');
    }

    public function barangKeluar(){
        return $this->hasMany('App\barangkeluar', 'id_return_pembelian', 'id');
    }

    // id_return_pembelian

}
