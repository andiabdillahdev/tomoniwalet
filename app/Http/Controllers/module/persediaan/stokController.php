<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stok;
use DataTables;
use App\pesanan_pembelian_header;
use App\pesanan_pembelian_detail;
use App\retail_penjualan_detail;
class stokController extends Controller
{

    public function getAll(){
        $data = stok::with('produk')->get();
        // return $data;
        return DataTables::of($data)
        ->editColumn('produk', function ($list) {
            return $list['produk'] ? $list['produk']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function index(){
        return view('panel.owner.persediaan.stok.index');
    }

    public function riwayat($params){
        $stok = stok::where('id',$params)->first();
        $barang_keluar = [];
        
        // Barang masuk
        $pesanan_pembelian = pesanan_pembelian_detail::with('pesanan_pembelian_header')->where('id_produk',$stok['id_produk'])->get();
        // 
        
        // Barang Keluar
            $kasir = retail_penjualan_detail::with('retail_penjualan_header')->where('id_produk',$stok['id_produk'])->get();
            foreach ($kasir as $key => $value) {
                $barang_keluar[$key] = [
                    'tanggal' => $value['retail_penjualan_header']['tanggal'],
                    'jenis_tagihan' => 'Retail / Kasir',
                    'mode' => 'kasir',
                    'id' => $value['id_retail_penjualan_header']
                ];
            }
            // return $kasir;
        // 
        return view('panel.owner.persediaan.stok.riwayat',compact('stok','pesanan_pembelian','barang_keluar'));
    }
}
