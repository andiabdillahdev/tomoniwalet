<?php

namespace App\Http\Controllers\module\pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pesananController extends Controller
{
    public function view($page) {
        return view('panel.owner.kelola_pesanan.'.$page);
    }
}
