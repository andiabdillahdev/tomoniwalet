<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stok;
use DataTables;
use App\pesanan_pembelian_header;
use App\pesanan_pembelian_detail;
use App\retail_penjualan_detail;
use App\returPembelian;
use App\returPembelianDetail;
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
        $out1 = [];
        $out2 = [];
        
        // Barang masuk
        $pesanan_pembelian = pesanan_pembelian_detail::with('pesanan_pembelian_header')->where('id_produk',$stok['id_produk'])->get();
        // 
        
        // Barang Keluar
            $kasir = retail_penjualan_detail::with('retail_penjualan_header')->where('id_produk',$stok['id_produk'])->get();
            $retur_pembelian = returPembelianDetail::with('returPembelian')->where('id_produk',$stok['id_produk'])->get();
            foreach ($kasir as $key => $value) {
                $out1[$key] = [
                    'tanggal' => $value['retail_penjualan_header']['tanggal'],
                    'jenis_tagihan' => 'Retail / Kasir',
                    'mode' => 'kasir',
                    'id' => $value['id_retail_penjualan_header']
                ];
            }
           
            foreach ($retur_pembelian as $x => $y) {
                $out2[$x] = [
                    'tanggal' => $y['returPembelian']['tanggal'],
                    'jenis_tagihan' => 'Retur Pembelian',
                    'mode' => 'retur',
                    'id' => $y['id_retur_pembelian_header']
                ];
            }

            $barang_keluar = array_merge($out1, $out2);            
        return view('panel.owner.persediaan.stok.riwayat',compact('stok','pesanan_pembelian','barang_keluar'));
    }
}
