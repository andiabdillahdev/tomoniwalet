<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hero_section;
use App\produk;
use App\testimonial;
use App\kategori;

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

    public function getBelanja(){
        $data = produk::where('status','Aktif')->get();
        $result = [];
        foreach ($data as $dta) {
            $dta['nama_kategori'] = $dta->kategori->nama;
            $dta['foto'] = $dta->gambar_detail[0]->gambar;
            $dta['harga'] = 'Rp '.number_format($dta->harga);
            $result[] = $dta;
        }
        return $result;
    }

    public function getKategori(){
        $data = kategori::all();
        $html = '<option value="">Pilih Kategori Produk</option>';
        foreach ($data as $dta) {
            $html .= '<option value="'.$dta->id.'">'.$dta->nama.'</option>';
        }
        return response()->json($html);
    }
}
