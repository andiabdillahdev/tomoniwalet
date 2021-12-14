<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hero_section;
use App\produk;
use App\testimonial;
use App\kategori;
use App\keranjang;

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

    public function getCountCart(Request $request) {
        $data = keranjang::where('user_id', $request->user_id)->where('status', 'invalid')->get();

        if (count($data) > 0) {
            $html = '<span class="position-absolute top-5 start-80 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">'.count($data).'</span>';
        } else {
            $html = '';
        }
        
        return response()->json($html);
    }
}
