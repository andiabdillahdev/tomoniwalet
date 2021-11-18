<?php

namespace App\Http\Controllers\module\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stok;
use DataTables;
class stokController extends Controller
{

    public function getAll(){
        $data = stok::with('produk')->get();
        // return $data;
        return DataTables::of($data)
        ->editColumn('produk', function ($list) {
            return $list['produk'] ? $list['produk']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function index(){
        return view('panel.owner.persediaan.stok.index');
    }
}
