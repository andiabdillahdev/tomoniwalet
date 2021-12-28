<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pengiriman_pesanan_header;
use App\pengiriman_pesanan_detail;
use DataTables;
use App\stok;
use App\User;
use PDF;
class pengirimanPesananController extends Controller
{

    public function getAll(){
        $data = pengiriman_pesanan_header::with('pengiriman_pesanan_detail','user')->get();
        // return $data;
        return DataTables::of($data)
        ->editColumn('pelanggan', function ($list) {
            return $list['user'] ? $list['user']['name']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function index(){
        return view('panel.owner.persediaan.pengiriman_pesanan.index');
    }

    public function kode(){
        $nomor = pengiriman_pesanan_header::orderBy('id', 'desc')->first();
        if (!isset($nomor)) {
            $kode = 'TMW-DO'.'-'.date('Y').'-0001';
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
            $kode = 'TMW-DO'.'-'.date('Y').'-'.$no.''.$numbers;

        }
        return $kode;
    }

    public function user_customer(){
        $data = User::where('role',3)->get();
        return collect($data)->pluck('email', 'id')->toArray();
    }

    public function create(){
        $kode = $this->kode();
        $user_customer = $this->user_customer();
        return view('panel.owner.persediaan.pengiriman_pesanan.create',compact('kode','user_customer'));
    }

    public function store(Request $request){
        // return $request;
        $header = new pengiriman_pesanan_header();
        $header->user_id = $request['header'][0]['value'];
        $header->kode = $request['header'][1]['value'];
        if (isset($request['header'][2]['value'])) {
            $header->tanggal = $request['header'][2]['value'];
        }else{
            $header->tanggal = date('Y-m-d');
        }
        $header->lokasi_tujuan = $request['header'][3]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new pengiriman_pesanan_detail();
            $detail->id_pengiriman_pesanan_header  = $header->id;
            $detail->id_produk = $value[0];
            $detail->jumlah = $value[2];
            $detail->satuan = $value[3];
            $detail->harga = str_replace(',', '', $value[4]);
            $detail->total = str_replace(',', '', $value[5]);
            $detail->save();
        }

        if ($header) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Pengiriman Pesanan berhasil di Tambah'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Pengiriman Pesanan Gagal di Proses'
            ]); 
        }
    }

    public function edit($id){
        $data = pengiriman_pesanan_header::with('pengiriman_pesanan_detail')->where('id',$id)->first();
        // return $data;
        return view('panel.owner.persediaan.pengiriman_pesanan.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $delete_detail = pengiriman_pesanan_detail::where('id_pengiriman_pesanan_header',$id)->delete();

        $header = pengiriman_pesanan_header::where('id',$id)->first();
        $header->pelanggan = $request['header'][0]['value'];
        $header->kode = $request['header'][1]['value'];
        $header->tanggal = $request['header'][2]['value'];
        $header->lokasi_tujuan = $request['header'][3]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new pengiriman_pesanan_detail();
            $detail->id_pengiriman_pesanan_header  = $header->id;
            $detail->id_produk = $value[0];
            $detail->jumlah = $value[2];
            $detail->satuan = $value[3];
            $detail->harga = str_replace(',', '', $value[4]);
            $detail->total = str_replace(',', '', $value[5]);
            $detail->save();
        }

        if ($header) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Pengiriman Pesanan berhasil di Update'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Pengiriman Pesanan Gagal di Proses'
            ]); 
        }

    }

    public function belum_selesai(){
        $data = pengiriman_pesanan_header::with('pengiriman_pesanan_detail')->where('status','Belum Selesai')->get();
        return DataTables::of($data)
        ->rawColumns([])
        ->make(true);
    }

    public function detail_pesanan(){
        return view('panel.owner.persediaan.pengiriman_pesanan.detail_pesanan');
    }

    public function getDetail(Request $request){
        $result = [];
        $pelanggan = pengiriman_pesanan_header::where('id',$request->id_header)->first();
        $data = pengiriman_pesanan_detail::where('id_pengiriman_pesanan_header',$request->id_header)->get();
        
        $result = [
            'pelanggan' => $pelanggan['pelanggan'],
            'header_id' => $request->id_header,
            'detail' => $data
        ];
        
        return $result;
    }

    public function destroy($id){
        $data = pengiriman_pesanan_header::where('id',$id)->delete();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Pengiriman Pesanan berhasil di Hapus'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Pengiriman Pesanan Gagal di Proses'
           ]); 
       }
    }

    public function deliveryorder($params){
        $data = pengiriman_pesanan_header::with('user')->where('id',$params)->first();
        $detail = pengiriman_pesanan_detail::where('id_pengiriman_pesanan_header',$params)->get();
        // return $data;
        $pdf = PDF::loadView('panel.owner.persediaan.pengiriman_pesanan.nota',compact('data','detail'))->setPaper('a4', 'potrait')->setWarnings(false);
		return $pdf->stream();
    }
}
