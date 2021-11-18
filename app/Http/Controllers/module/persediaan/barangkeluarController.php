<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pengiriman_pesanan_header;
use App\pengiriman_pesanan_detail;
use App\barangkeluar;
use App\stok;
use DataTables;
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

    public function create(){
        $kode = $this->kode();
        return view('panel.owner.persediaan.barang_keluar.create',compact('kode'));
    }

    public function detailPengiriman(){
        return view('panel.owner.persediaan.barang_keluar.detail_pesanan');
    }

    public function store(Request $request){
        // return $request;
         $this->validate($request, [
            'kode' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'barang'=>'required'
        ]);

        $data = new barangkeluar();
        $data->id_pengiriman_pesanan_header = $request->barang;
        $data->kode  = $request->kode;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->save();

         // Cek Produk di Stok Tersedia
         $getProduk = pengiriman_pesanan_detail::where('id_pengiriman_pesanan_header',$data['id_pengiriman_pesanan_header'])->get();

         foreach ($getProduk as $key => $value) {
  
              $stok = stok::where('id_produk',$value->id_produk)->first();
              $data_stok = new stok();
             if (isset($stok)) {
                 $stok->jumlah = $stok->jumlah - $value->jumlah;
                 // $data_stok->id_produk = $value->id_produk;
                 // $data_stok->jumlah = $value->jumlah;
                 $stok->save();
             }
         }
 
         // dd($stok);
         // 
 
         $header = pengiriman_pesanan_header::where('id',$request->barang)->first();
         $header->status = 'Selesai';
         $header->save();
 
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
