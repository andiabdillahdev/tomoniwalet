<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\supplier;
use App\satuan;
use App\kategori;
use App\pesanan_pembelian_header;
use App\pesanan_pembelian_detail;
use DataTables;
use PDF;
class pesananpembelianController extends Controller
{
    public function index(){
        return view('panel.owner.persediaan.pesanan_pembelian.index');
    }

    public function supplier(){
        $data = supplier::all();
        return collect($data)->pluck('nama', 'id')->toArray();
    }

    public function getAll(){
        $data = pesanan_pembelian_header::with('pesanan_pembelian_detail','supplier')->get();
        // return $data;
        return DataTables::of($data)
        ->editColumn('supplier', function ($list) {
            return $list['supplier'] ? $list['supplier']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function bySupplier($params){
        $data = pesanan_pembelian_header::with('supplier')->where('id_supplier',$params)->where('status','Belum Selesai')->get();
        // return $data;
        return DataTables::of($data)
        ->editColumn('supplier', function ($list) {
            return $list['supplier'] ? $list['supplier']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function getDetail(Request $request){
        $result = [];
        $data = pesanan_pembelian_detail::where('id_pesanan_pembelian_header',$request->id_header)->get();
        
        $result = [
            'header_id' => $request->id_header,
            'detail' => $data
        ];
        
        return $result;
    }

    public function kode(){
        $nomor = pesanan_pembelian_header::orderBy('id', 'desc')->first();
        $kode = '';
        if (!isset($nomor)) {
            $kode = 'TMW-PO'.'-'.date('Y').'-1';
        }else{

            $getString = $nomor['kode'];
            $getFirst = substr($getString,12);
            $numbers = $getFirst+1;
            $kode = 'TMW-PO'.'-'.date('Y').'-'.$numbers;

        }
        return $kode;
    }

    public function create(){
        $kode = $this->kode();
        $supplier = $this->supplier();
        return view('panel.owner.persediaan.pesanan_pembelian.form',compact('supplier','kode'));
    }

    public function get_kategori() {
	    $data = kategori::all();
		return collect($data)->pluck('nama', 'id')->toArray();
	}

    public function detail_pesanan(){
        $kategori = $this->get_kategori();
        return view('panel.owner.persediaan.pesanan_pembelian.detail_pesanan',compact('kategori'));
    }

    public function store(Request $request){
        // return $request;
    
        // $this->validate($req_head,[
        //     'supplier' => 'required',
        //     'kode' => 'required',
        //     'tanggal' => 'required',
        // ]);

        $header = new pesanan_pembelian_header();
        $header->id_supplier = $request['header'][0]['value'];
        $header->kode = $request['header'][1]['value'];
        $header->tanggal = $request['header'][2]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new pesanan_pembelian_detail();
            $detail->id_pesanan_pembelian_header = $header->id;
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
                'message' => 'Data Pesanan Pembelian berhasil di Tambah'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Pesanan Pembelian Gagal di Proses'
            ]); 
        }

    }

    public function edit($id){
        $data = pesanan_pembelian_header::with('pesanan_pembelian_detail')->where('id',$id)->first();
        $supplier = $this->supplier();
        return view('panel.owner.persediaan.pesanan_pembelian.edit',compact('supplier','data'));
    }

    public function update(Request $request,$id){
        // return $request;
    
        // $this->validate($req_head,[
        //     'supplier' => 'required',
        //     'kode' => 'required',
        //     'tanggal' => 'required',
        // ]);

        $delete_detail = pesanan_pembelian_detail::where('id_pesanan_pembelian_header',$id)->delete();

        $header = pesanan_pembelian_header::where('id',$id)->first();
        $header->id_supplier = $request['header'][0]['value'];
        $header->kode = $request['header'][1]['value'];
        $header->tanggal = $request['header'][2]['value'];
        $header->save();

       
        foreach ($request['detail'] as $key => $value) {
            $detail = new pesanan_pembelian_detail();
            $detail->id_pesanan_pembelian_header = $header->id;
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
                'message' => 'Data Pesanan Pembelian berhasil di Update'
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Pesanan Pembelian Gagal di Proses'
            ]); 
        }

    }

    public function destroy($id){
        $data = pesanan_pembelian_header::where('id',$id)->delete();

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

    public function purchase_order($params){
        $data = pesanan_pembelian_header::with('supplier')->where('id',$params)->first();
        $detail = pesanan_pembelian_detail::with('produk')->where('id_pesanan_pembelian_header',$params)->get();
        // return $data;
        $pdf = PDF::loadView('panel.owner.persediaan.pesanan_pembelian.nota',compact('data','detail'))->setPaper('a4', 'potrait')->setWarnings(false);
		return $pdf->stream();
    }

}
