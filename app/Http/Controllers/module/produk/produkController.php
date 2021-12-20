<?php

namespace App\Http\Controllers\module\produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\produk;
use App\gambar_detail;
use App\kategori;
use DataTables;

class produkController extends Controller
{

    public function getAll(){
        $data = produk::with('kategori','gambar_detail')->get();
        return DataTables::of($data)
        ->editColumn('kategori', function ($list) {
            return $list['kategori'] ? $list['kategori']['nama']: NULL;
        })
        ->rawColumns([])
        ->make(true);
    }

    public function index(){
        return view('panel.owner.produk.index');
    }

    public function create(){
        $kategori = $this->get_kategori();
        return view('panel.owner.produk.form',compact('kategori'));
    }

    public function store(Request $request){
        // return $request;
        $kategori = kategori::where('id',$request->kategori_id)->first();

        $nomor = produk::orderBy('id', 'desc')->first();
        $kode = '';
        // return $kategori;
        if (!isset($nomor)) {
            $kode = 'TMW-PRD-'.substr($kategori['kode'],8).'0001';
        }else{
            $no = ''; 
            $getString = $nomor['kode'];
            $getFirst = substr($getString,12);

           
            // return $kode;
            $getcount = substr_count($getFirst, '0');
           
            $numbers = 0;
            if ($getcount == 3) {
                $no = '00';
                $getFirst = substr($getFirst,3);
            }elseif ($getcount == 2) {

            }else{
                $no = ''; 
            }
            $kode = $getFirst;
            $numbers = $getFirst+1;

            $kode = 'TMW-PRD-'.substr($kategori['kode'],8).'-'.$no.''.$numbers;

        }

        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'garansi' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'images' => 'required'
        ]);

        $data = new produk();
        $data->kategori_id = $request->kategori_id;
        $data->kode = $kode;
        $data->nama = $request->nama;
        $data->harga = str_replace(',', '', $request->harga);
        $data->berat = $request->berat;
        $data->garansi = $request->garansi;
        $data->deskripsi = $request->deskripsi;
        $data->status = $request->status;
        $data->save();

        $images = [];
        if ($request->hasFile('images')) {
          
            
            $files = $request->file('images');
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/produk'), $name);
                $images = $name;

                $gambar = new gambar_detail();
                $gambar->id_produk = $data->id;
                $gambar->gambar = $name;
                $gambar->save();
            }
        }

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Produk berhasil di Tambah'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Produk Gagal di Proses'
           ]); 
       }

    }

    public function get_kategori() {
	    $data = kategori::all();
		return collect($data)->pluck('nama', 'id')->toArray();
	}

    public function detail($id){
        $data = produk::with('kategori','gambar_detail')->where('id',$id)->first();
        return view('panel.owner.produk.detail',compact('data'));
    }

    public function edit($id){
        $kategori = $this->get_kategori();
        $data = produk::with('kategori','gambar_detail')->where('id',$id)->first();
        return view('panel.owner.produk.edit',compact('data','kategori'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'garansi' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        $data = produk::where('id',$id)->first();
        $data->kategori_id = $request->kategori_id;
        $data->nama = $request->nama;
        $data->harga = str_replace(',', '', $request->harga);
        $data->berat = $request->berat;
        $data->garansi = $request->garansi;
        $data->deskripsi = $request->deskripsi;
        $data->status = $request->status;
        $data->save();

        $images = [];
        if (isset($request->images)) {
            $gambar_delete = gambar_detail::where('id_produk',$data->id)->delete();
            if ($gambar_delete) {
                if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    foreach ($files as $file) {
                        $name = $file->getClientOriginalName();
                        $file->move(public_path('uploads/produk'), $name);
                        $images = $name;
        
                        $gambar = new gambar_detail();
                        $gambar->id_produk = $data->id;
                        $gambar->gambar = $name;
                        $gambar->save();
                    }
                }
            }
        }

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Produk berhasil di Update'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Produk Gagal di Proses'
           ]); 
       }
    }
}
