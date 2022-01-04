<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_hero extends Model
{
    protected $table = 'tb_kategori_hero';

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
}
