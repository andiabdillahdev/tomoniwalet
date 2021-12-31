<?php

namespace App\Http\Controllers\module\retur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\supplier;
use App\returPembelian;
use App\returPembelianDetail;
use DataTables;
class returPembelianController extends Controller
{

    public function kode(){
        $nomor = returPenjualanHeader::orderBy('id', 'desc')->first();
        $kode = '';
        if (!isset($nomor)) {
            $kode = 'TMW-RTR-01'.'-'.date('Y').'-1';
        }else{

            $getString = $nomor['kode'];
            $getFirst = substr($getString,16);
            $numbers = $getFirst+1;
            $kode = 'TMW-RTR-01'.'-'.date('Y').'-'.$numbers;

        }
        return $kode;
    }

    public function getAll(){
        $data = returPembelian::all();
        // return $data;
        return DataTables::of($data)
        ->editColumn('supplier', function ($list) {
            return $list['supplier'] ? $list['supplier']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function supplier(){
        $data = supplier::all();
        return collect($data)->pluck('nama', 'id')->toArray();
    }

    public function index(){
        return view('panel.owner.retur.retur_pembelian.index');
    }

    public function create(){
        $supplier = $this->supplier();
        return view('panel.owner.retur.retur_pembelian.form',compact('supplier'));
    }

    public function store(Request $request){
        // return $request;
        $header = new returPembelian();
        $header->id_supplier = $request['header'][0]['value'];
        $header->kode = $this->kode();
        $header->tanggal = $request['header'][1]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new returPembelianDetail();
            $detail->id_retur_pembelian_header  = $header->id;
            $detail->id_produk = $value[0];
            $detail->satuan = $value[3];
            $detail->jumlah = $value[2];
            $detail->harga = str_replace(',', '', $value[4]);
            $detail->total = str_replace(',', '', $value[5]);
            $detail->save();
        }

        if ($header) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Retur Pembelian berhasil di Tambah'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Retur Pembelian Gagal di Proses'
            ]); 
        }
    }

    public function edit($params){
        $data = returPembelian::with('returPembelianDetail')->where('id',$params)->first();
        $supplier = $this->supplier();
        return view('panel.owner.retur.retur_pembelian.edit',compact('data','supplier'));
    }

    public function update(Request $request,$id){
        // return $request;

        $delete_detail = returPembelianDetail::where('id_retur_pembelian_header',$id)->delete();

        $header = returPembelian::where('id',$id)->first();
        $header->id_supplier = $request['header'][0]['value'];
        $header->tanggal = $request['header'][1]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new returPembelianDetail();
            $detail->id_retur_pembelian_header  = $header->id;
            $detail->id_produk = $value[0];
            $detail->satuan = $value[3];
            $detail->jumlah = $value[2];
            $detail->harga = str_replace(',', '', $value[4]);
            $detail->total = str_replace(',', '', $value[5]);
            $detail->save();
        }

        if ($header) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Retur Pembelian berhasil di Update'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Retur Pembelian Gagal di Proses'
            ]); 
        }
    }

    public function destroy($id){
        $data = returPembelian::where('id',$id)->delete();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Pesanan Pembelian berhasil di Hapus'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Pesanan Pembelian Gagal di Proses'
           ]); 
       }
    }

    
}
