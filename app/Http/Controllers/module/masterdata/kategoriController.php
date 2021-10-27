<?php

namespace App\Http\Controllers\module\masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\kategori;

class kategoriController extends Controller
{

    public function automatic_kode(){
        $nomor = kategori::orderBy('id', 'desc')->first();
        if (empty($nomor)) {
            $result = 'TMW-KTR-'.'00' . 1;
        }else{
            $getString = $nomor['kode'];
            $getFirst = substr($getString,8);
            $getcount = substr_count($getFirst, '0');
            $numbers = 0;
            if ($getcount == 2) {
                $no = '00';
                $getFirst = substr($getString,10);
            }elseif ($getcount == 1) {
                $no = '0';
                $getFirst = substr($getString,9);
            }else{
                $no = ''; 
            }

            $numbers = $getFirst+1;

            $result =  'TMW-SPL-'.$no.''.$numbers;
        }
        return $result;
    }

    public function index(){
        return view('panel.owner.masterdata.kategori.index');
    }

    public function create(){
        $number = $this->automatic_kode();
        return view('panel.owner.masterdata.kategori.form',compact('number'));
    }

    public function getAll(){
        $data = kategori::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode' => 'required|unique:kategoris,kode',
            'nama' => 'required|unique:kategoris,nama',
        ]);

        $data = new kategori();
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->save();

        if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Kategori berhasil di Tambah'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Kategori Gagal di Proses'
            ]); 
        }
    }

    public function edit($id){
        $data = kategori::where('id',$id)->first();
        return view('panel.owner.masterdata.kategori.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $data = kategori::where('id',$id)->first();
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->save();

        if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Kategori berhasil di Update'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Kategori Gagal di Proses'
            ]); 
        }
    }

    public function destroy($id){
        $data = kategori::where('id',$id)->first();
        $data->delete();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Supplier berhasil di Hapus'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Supplier Gagal di Proses'
           ]); 
       }

    }

}
