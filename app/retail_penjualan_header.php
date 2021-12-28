<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retail_penjualan_header extends Model
{
    protected $table = 'tb_retail_penjualan_header';

    public function staff(){
        return $this->belongsTo('App\User', 'id_staff', 'id');
    }

    public function retail_penjualan_detail(){
        return $this->hasMany('App\retail_penjualan_detail','id_retail_penjualan_header','id');
    }
}
