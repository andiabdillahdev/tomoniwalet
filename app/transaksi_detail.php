<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    protected $table = 'tb_transaksi_detail';
    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo(keranjang::class, 'keranjang_id', 'id');
    }
}
