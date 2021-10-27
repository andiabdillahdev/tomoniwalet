<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = [
        'kode', 'nama'
    ]; 

    public function produk()
    {
        return $this->hasMany('App\produk', 'kategori_id');
    }
}
