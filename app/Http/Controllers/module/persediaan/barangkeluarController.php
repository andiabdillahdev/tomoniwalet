<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pengiriman_pesanan_header;
use App\pengiriman_pesanan_detail;
use App\returPenjualanHeader;
use App\returPembelianDetail;
use App\barangkeluar;
use App\supplier;
use App\stok;
use DataTables;
use App\User;
class barangkeluarController extends Controller
{

    public function getAll(){
        $data = barangkeluar::all();
        return DataTables::of($data)
        ->rawColumns([])
        ->make(true);
    }

    public function kode(){
        $nomor = pengiriman_pesanan_header::orderBy('id', 'desc')->first();
        if (!isset($nomor)) {
            $kode = 'TMW-BK'.'-'.date('Y').'-0001';
        }else{

            $getString = $nomor['kode'];
            $getFirst = substr($getString,13);

            
            $getcount = substr_count($getFirst, '0');
            // return $getFirst;
            $numbers = 0;
            if ($getcount == 3) {
                $no = '000';
                $getFirst = substr($getFirst,3);
            }elseif ($getcount == 2) {
                $no = '00';
                $getFirst = substr($getFirst,2);
            }elseif ($getcount == 1) {
                $no = '0';
                $getFirst = substr($getFirst,1);
            }else{
                $no = ''; 
            }
            // $kode = $getFirst;
            $numbers = $getFirst+1;

            // $kode = 'TMW-PRD-'.substr($kategori['kode'],8).'-'.$no.''.$numbers;
            $kode = 'TMW-BK'.'-'.date('Y').'-'.$no.''.$numbers;

        }
        return $kode;
    }

    public function index(){
        return view('panel.owner.persediaan.barang_keluar.index');
    }

    public function user_customer(){
        $data = User::where('role',3)->get();
        return collect($data)->pluck('email', 'id')->toArray();
    }

    public function supplier(){
        $data = supplier::all();
        return collect($data)->pluck('nama', 'id')->toArray();
    }

    public function create(){
        $kode = $this->kode();
        $user = $this->user_customer();
        $supplier = $this->supplier();
        return view('panel.owner.persediaan.barang_keluar.create',compact('kode','user','supplier'));
    }

    public function detailPengiriman(){
        return view('panel.owner.persediaan.barang_keluar.detail_pesanan');
    }

    public function detailRetur(){
        return view('panel.owner.persediaan.barang_keluar.detail_retur');
    }

    public function store(Request $request){
        // return $request;
         $this->validate($request, [
            'kode' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        $data = new barangkeluar();
        $data->id_pengiriman_pesanan_header = $request->barang;
        $data->id_return_pembelian = $request->id_header_retur;
        $data->kode  = $request->kode;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->save();

        if ($request->barang == null || $request->barang == '' ) {
            $getProduk = returPembelianDetail::where('id_retur_pembelian_header',$data['id_return_pembelian'])->get();

            foreach ($getProduk as $key => $value) {
                $stok = stok::where('id_produk',$value->id_produk)->first();
                $data_stok = new stok();
               if (isset($stok)) {
                   $stok->jumlah = $stok->jumlah - $value->jumlah;
                   $stok->save();
               }
            }
        }else{
            // Cek Produk di Stok Tersedia
            $getProduk = pengiriman_pesanan_detail::where('id_pengiriman_pesanan_header',$data['id_pengiriman_pesanan_header'])->get();

            $header = pengiriman_pesanan_header::where('id',$request->barang)->first();
            $header->status = 'Selesai';
            $header->save();

            foreach ($getProduk as $key => $value) {
                $stok = stok::where('id_produk',$value->id_produk)->first();
                $data_stok = new stok();
               if (isset($stok)) {
                   $stok->jumlah = $stok->jumlah - $value->jumlah;
                   $stok->save();
               }
            }

        }
 
         if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Barang Keluar berhasil di Tambah'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Barang Keluar Gagal di Proses'
            ]); 
        }

    }

    public function edit($id){
        $data = barangkeluar::with('pengiriman_pesanan_header')->where('id',$id)->first();
        $detail = pengiriman_pesanan_detail::where('id_pengiriman_pesanan_header',$data['id_pengiriman_pesanan_header'])->get();
        // return $detail;
        return view('panel.owner.persediaan.barang_keluar.edit',compact('data','detail'));
    }

    public function update(Request $request,$id){

        // return $request;
        
        $this->validate($request, [
            'kode' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'barang'=>'required'
        ]);

        $data = barangkeluar::where('id',$id)->first();
        $data->id_pengiriman_pesanan_header = $request->barang;
        $data->kode  = $request->kode;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->save();

        // $header = pesanan_pembelian_header::where('id',$request->barang)->first();
        // $header->status = 'Selesai';
        // $header->save();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Barang Keluar berhasil di Update'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Barang Keluar Gagal di Proses'
           ]); 
       }
    }
}
