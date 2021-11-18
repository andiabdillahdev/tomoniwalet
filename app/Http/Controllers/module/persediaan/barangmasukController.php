<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\barangmasuk;
use DataTables;
use App\supplier;
use App\pesanan_pembelian_header;
use App\pesanan_pembelian_detail;
use App\stok;
class barangmasukController extends Controller
{

    public function getAll(){
        $data = barangmasuk::all();
        return DataTables::of($data)
        ->rawColumns([])
        ->make(true);
    }

    public function supplier(){
        $data = supplier::all();
        return collect($data)->pluck('nama', 'id')->toArray();
    }

    public function kode(){
        $nomor = pesanan_pembelian_header::orderBy('id', 'desc')->first();
        if (!isset($nomor)) {
            $kode = 'TMW-PO'.'-'.date('Y').'-0001';
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
            $kode = 'TMW-PO'.'-'.date('Y').'-'.$no.''.$numbers;

        }
        return $kode;
    }


    public function index(){
        return view('panel.owner.persediaan.barang_masuk.index');
    }

    public function create(){
        $kode = $this->kode();
        $supplier = $this->supplier();
        return view('panel.owner.persediaan.barang_masuk.form',compact('kode','supplier'));
    }

    public function bysupplier(){
        return view('panel.owner.persediaan.barang_masuk.detail_pesanan_header');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'kode' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'barang'=>'required'
        ]);


        // $stok = barangmasuk::where('id_produk',)

        $data = new barangmasuk();
        $data->id_pesanan_pembelian_header = $request->barang;
        $data->kode  = $request->kode;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->save();

        // Cek Produk di Stok Tersedia
        $getProduk = pesanan_pembelian_detail::where('id_pesanan_pembelian_header',$data['id_pesanan_pembelian_header'])->get();

        foreach ($getProduk as $key => $value) {
 
             $stok = stok::where('id_produk',$value->id_produk)->first();
             $data_stok = new stok();
            if (isset($stok)) {
                $stok->jumlah = $stok->jumlah + $value->jumlah;
                // $data_stok->id_produk = $value->id_produk;
                // $data_stok->jumlah = $value->jumlah;
                $stok->save();
            }else{
                
                $data_stok->id_produk = $value->id_produk;
                $data_stok->jumlah = $value->jumlah;
                $data_stok->save();
            }
        }

        // dd($stok);
        // 

        $header = pesanan_pembelian_header::where('id',$request->barang)->first();
        $header->status = 'Selesai';
        $header->save();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Barang Masuk berhasil di Tambah'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Barang Masuk Gagal di Proses'
           ]); 
       }
    }

    public function edit($id){
        $data = barangmasuk::with('pesanan_pembelian_header')->where('id',$id)->first();
        $supplier = $this->supplier();
        $detail = pesanan_pembelian_detail::where('id_pesanan_pembelian_header',$data['id_pesanan_pembelian_header'])->get();
        // return $detail;
        return view('panel.owner.persediaan.barang_masuk.edit',compact('data','supplier','detail'));
    }

    public function update(Request $request,$id){

        // return $request;
        
        $this->validate($request, [
            'kode' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'barang'=>'required'
        ]);

        $data = barangmasuk::where('id',$id)->first();
        $data->id_pesanan_pembelian_header = $request->barang;
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
                'message' => 'Data Barang Masuk berhasil di Update'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Barang Masuk Gagal di Proses'
           ]); 
       }
    }
}
