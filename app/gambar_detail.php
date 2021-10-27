<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gambar_detail extends Model
{
    protected $table = 'gambar_produk';
    
    public function produk()
    {
        return $this->belongsTo('App\produk', 'id_produk');
    }
}
