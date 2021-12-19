<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'tb_transaksi_header';
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(transaksi_detail::class);
    }
}
