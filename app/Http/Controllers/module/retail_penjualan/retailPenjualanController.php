<?php

namespace App\Http\Controllers\module\retail_penjualan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\retail_penjualan_header;
use App\retail_penjualan_detail;

class retailPenjualanController extends Controller
{

    public function getAll(){
        $data = retail_penjualan_header::with('staff')->get();
        return DataTables::of($data)
        ->editColumn('staff', function ($list) {
            return $list['staff'] ? $list['staff']['name']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function index(){
        return view('panel.owner.retail_penjualan.index');
    }

    public function detail_transaksi($params){
        $data = retail_penjualan_header::with('staff')->where('id',$params)->first();
        $detail = retail_penjualan_detail::with('produk')->where('id_retail_penjualan_header',$params)->get();
        return view('panel.owner.retail_penjualan.detail',compact('data','detail'));
    }

}
