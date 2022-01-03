<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hero_section;
use App\produk;
use App\testimonial;
use App\kategori;
use App\keranjang;
use App\stok;

class sourcePageController extends Controller
{
    public function getheroSection()
    {
        $data = hero_section::all();

        return response()->json([
            'hero_section' => $data
        ]);
    }

    public function getProdukTerbaru()
    {
        $data = produk::with('kategori', 'gambar_detail')->latest()->paginate(4);
        return $data;
    }

    public function getTestimonial()
    {
        $data = testimonial::where('status', 'aktif')->get();
        return $data;
    }

    public function getBelanja(Request $request)
    {
        if ($request->target == 'kat') {
            $data = produk::where('status', 'Aktif')->get();
            $title = 'Semua Produk';
            if ($request->params) {
                $data = produk::where('status', 'Aktif')->where('kategori_id', $request->params)->get();
                $title = kategori::where('id', $request->params)->first()->nama;
            }
        } else if ($request->target == 'price') {
            $jum = count(produk::where('status', 'Aktif')->get()) / 2;
            if ($request->params == 'down') {
                $data = produk::where('status', 'Aktif')->orderBy('harga', 'asc')->limit(ceil($jum))->get();
                $title = 'Harga Terendah';
            } else if ($request->params == 'up') {
                $data = produk::where('status', 'Aktif')->orderBy('harga', 'desc')->limit(ceil($jum))->get();
                $title = 'Harga Tertinggi';
            } else if ($request->params == 'many') {
                $data = produk::where('status', 'Aktif')->withCount(['keranjang' => function ($query) {
                    $query->where('status', 'valid');
                }])->orderBy('keranjang_count', 'desc')->get();
                $title = 'Produk Paling Laku';
            }
        }

        $result = [];
        foreach ($data as $dta) {
            $dta['nama_kategori'] = $dta->kategori->nama;
            $dta['foto'] = $dta->gambar_detail[0]->gambar;
            $dta['harga'] = 'Rp ' . number_format($dta->harga);
            $result[] = $dta;
        }
        return [
            'res' => $result,
            'title' => $title
        ];
    }

    public function getKategori()
    {
        $data = kategori::all();
        $html = '<option value="">Semua Produk</option>';
        foreach ($data as $dta) {
            $html .= '<option value="' . $dta->id . '">' . $dta->nama . '</option>';
        }
        return response()->json($html);
    }

    public function getCountCart(Request $request)
    {
        $data = keranjang::where('user_id', $request->user_id)->where('status', 'invalid')->get();

        if (count($data) > 0) {
            $html = '<span class="position-absolute top-5 start-80 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">' . count($data) . '</span>';
        } else {
            $html = '';
        }

        return response()->json($html);
    }

    public function getProdukTerlaris()
    {
        $data = stok::with('produk')->orderBy('jumlah', 'desc')->paginate(4);
        return $data;
    }

    public function getLocation(Request $request)
    {
        if ($request->id) $url = "https://api.rajaongkir.com/starter/city?province=" . $request->id;
        else $url = "https://api.rajaongkir.com/starter/province";
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "key: 35fbb9c26760769e9a5874c20ad90004"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return response()->json(json_decode($response));
    }
}
