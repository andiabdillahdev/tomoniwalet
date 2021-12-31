<?php

namespace App\Http\Controllers\module\retur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\returPenjualanHeader;
use App\returPenjualanDetail;
use App\User;
use DataTables;
class returPenjualanController extends Controller
{

    public function kode(){
        $nomor = returPenjualanHeader::orderBy('id', 'desc')->first();
        $kode = '';
        if (!isset($nomor)) {
            $kode = 'TMW-RTR-02'.'-'.date('Y').'-1';
        }else{

            $getString = $nomor['kode'];
            $getFirst = substr($getString,16);
            $numbers = $getFirst+1;
            $kode = 'TMW-RTR-02'.'-'.date('Y').'-'.$numbers;

        }
        return $kode;
    }

    public function getAll(){
        $data = returPenjualanHeader::all();
        // return $data;
        return DataTables::of($data)
        ->editColumn('pelanggan', function ($data) {
            if ($data['user_id'] != null) {
                return $data['user']['name'].' | '.$data['user']['email'];
            } else {
                return $data['customer'];
            }
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
        // return $request;
        $header = new returPenjualanHeader();
        if ($request['header'][0]['value'] != null) {
            $header->user_id = $request['header'][0]['value'];
        }else{
            $header->customer = $request['header'][1]['value'];
        }
        $header->kode = $this->kode();
        $header->tanggal = $request['header'][2]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new returPenjualanDetail();
            $detail->id_retur_penjualan_header = $header->id;
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
                'message' => 'Data Retur Penjualan berhasil di Tambah'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Retur Penjualan Gagal di Proses'
            ]); 
        }
    }


    public function edit($params){
        $data = returPenjualanHeader::with('returPenjualanDetail')->where('id',$params)->first();
        $user = $this->user();
        // return $data;
        return view('panel.owner.retur.retur_penjualan.edit',compact('data','user'));
    }

  
    public function update(Request $request,$id){
        $delete_detail = returPenjualanDetail::where('id_retur_penjualan_header',$id)->delete();

        $header = returPenjualanHeader::where('id',$id)->first();
        if ($request['header'][0]['value'] != null) {
            $header->user_id = $request['header'][0]['value'];
        }else{
            $header->customer = $request['header'][1]['value'];
        }
        $header->kode = $this->kode();
        $header->tanggal = $request['header'][2]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new returPenjualanDetail();
            $detail->id_retur_penjualan_header  = $header->id;
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
                'message' => 'Data Retur Penjualan berhasil di Update'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Retur Penjualan Gagal di Proses'
            ]); 
        }
    }

    public function destroy($id){
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
