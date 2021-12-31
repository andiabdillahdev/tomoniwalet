<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function retail_penjualan_header(){
        return $this->hasMany('App\retail_penjualan_header', 'id_staff', 'id');
    }

    public function pengiriman_pesanan_header(){
        return $this->hasMany('App\pengiriman_pesanan_header', 'user_id', 'id');
    }

    public function returPenjualanHeader(){
        return $this->hasMany('App\returPenjualanHeader', 'user_id', 'id');
    }

}
