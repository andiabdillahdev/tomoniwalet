<?php

namespace App\Http\Controllers\module\retur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\returPenjualanHeader;
use App\returPenjualanDetail;
use App\User;

class returPenjualanController extends Controller
{

    public function getAll(){
        $data = returPenjualanHeader::all();
        // return $data;
        return DataTables::of($data)
        ->editColumn('supplier', function ($list) {
            return $list['supplier'] ? $list['supplier']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function index(){
        return view('panel.owner.retur.retur_penjualan.index');
    }

    public function user(){
        $user = User::where('role',3)->get();
        return collect($user)->pluck('email', 'id')->toArray();
    }

    public function create(){
        $user = $this->user();
        return view('panel.owner.retur.retur_penjualan.form',compact('user'));
    }

    public function store(Request $request){
        $header = new returPenjualanHeader();
        $header->id_supplier = $request['header'][0]['value'];
        $header->kode = $this->kode();
        $header->tanggal = $request['header'][1]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new returPenjualanDetail();
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
        return view('panel.owner.retur.retur_penjualan.edit');
    }

  
    public function update(Request $request,$id){
        $delete_detail = returPenjualanDetail::where('id_retur_pembelian_header',$id)->delete();

        $header = returPenjualanHeader::where('id',$id)->first();
        $header->id_supplier = $request['header'][0]['value'];
        $header->tanggal = $request['header'][1]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new returPenjualanDetail();
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

    public function destroy(){
        $data = returPenjualanHeader::where('id',$id)->delete();

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
