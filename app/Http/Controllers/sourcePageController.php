<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hero_section;
use App\produk;
use App\testimonial;
class sourcePageController extends Controller
{
    public function getheroSection(){
        $data = hero_section::all();

        return response()->json([
            'hero_section' => $data
        ]);
    }

    public function getProdukTerbaru(){
        $data = produk::with('kategori','gambar_detail')->latest()->paginate(4);
        return $data;
    }

    public function getTestimonial(){
        $data = testimonial::where('status','aktif')->get();
        return $data;
    }
}
