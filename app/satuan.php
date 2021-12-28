<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
   protected $table = 'satuans';

   public function pesanan_pembelian_detail(){
         return $this->hasMany('App\pesanan_pembelian_detail','id','id_satuan');
   }
}
