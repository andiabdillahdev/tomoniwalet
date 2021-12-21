<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'tb_transaksi_header';
    protected $guarded = [];

    public function item()
    {
        return $this->hasMany(transaksi_detail::class, 'transaksi_header_id', 'id');
    }
}