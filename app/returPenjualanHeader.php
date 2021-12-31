<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returPenjualanHeader extends Model
{
    protected $table = 'tb_retur_penjualan_header';
    protected $with = ['user'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function returPenjualanDetail(){
        return $this->hasMany('App\returPenjualanDetail', 'id_retur_penjualan_header', 'id');
    }

}
