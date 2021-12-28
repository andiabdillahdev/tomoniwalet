<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\gambar_detail;
use App\retail_penjualan_header;
use App\retail_penjualan_detail;
use Illuminate\Support\Facades\Auth;
use App\stok;
use DataTables;
class staffController extends Controller
{
    public function index(){
        return view('panel.staff.index');
    }

    public function getProduk(){
        $data = produk::all();
        return collect($data)->pluck('nama', 'id')->toArray();
    }

    public function kasir(){
        $produk = $this->getProduk();
        return view('panel.staff.kasir.index',compact('produk'));
    }

    public function riwayat(){
        return view('panel.staff.kasir.riwayat');
    }

    public function getByIDProduk($id){
        $data  = produk::where('id',$id)->first();
        $gambar = gambar_detail::where('id_produk',$id)->first();

        return $data;
    }

    public function kode(){
        $nomor = retail_penjualan_header::orderBy('id', 'desc')->first();
        $kode = '';
        if (!isset($nomor)) {
            $kode = 'TMW-KASIR'.'-'.date('Y').'-1';
        }else{

            $getString = $nomor['kode'];
            $getFirst = substr($getString,15);
            $numbers = $getFirst+1;
            $kode = 'TMW-KASIR'.'-'.date('Y').'-'.$numbers;

        }
        return $kode;
    }

    public function store(Request $request){
        // return $request;
        $data = new retail_penjualan_header();
        $data->id_staff = Auth::user()->id;
        $data->kode = $this->kode();
        $data->tanggal = date('Y-m-d');
        $data->total = str_replace(',', '', $request->header[0]['value']);
        $data->cash = str_replace(',', '', $request->header[1]['value']);
        $data->kembalian = str_replace(',', '', $request->header[2]['value']);
        $data->save();

        foreach ($request->detail as $key => $value) {
            $detail = new retail_penjualan_detail();
            $detail->id_retail_penjualan_header = $data->id;
            $detail->id_produk  = $value[0];
            $detail->kuantitas = $value[3];
            $detail->save();

            $stok = stok::where('id_produk', $detail['id_produk'])->first();
            
           if (isset($stok)) {
               $stok->jumlah = $stok->jumlah - $value[3];
               $stok->save();
           }

        }

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'data' => $data,
                'message' => 'Data berhasil Proses'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Produk Gagal di Proses'
           ]); 
       }

    }

    public function getRiwayat(){
        $data = retail_penjualan_header::with('staff')->get();
        return DataTables::of($data)
        ->editColumn('staff', function ($data) {
            return $data['staff'] ? $data['staff']['name']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function nota($params){
        $data = retail_penjualan_header::with('retail_penjualan_detail')->where('id',$params)->first();
        // return $data;
        return view('panel.staff.kasir.nota',compact('data'));
    }

    public function getRiwayatdetail($params){
        $data = retail_penjualan_header::with('staff','retail_penjualan_detail')->where('id',$params)->first();
        $detail = retail_penjualan_detail::with('produk')->where('id_retail_penjualan_header',$params)->get();
        return view('panel.staff.kasir.detail',compact('data','detail'));
    }
}
