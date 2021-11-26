<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function index(){
        return view('homepage.index');
    }

    public function tentang(){
        return view('homepage.tentang');
    }

    public function belanja_list(){
        return view('homepage.belanja.index');
    }
}
