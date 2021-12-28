<?php

namespace App\Http\Controllers\module\masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\satuan;

class satuanController extends Controller
{
    public function getAll(){
        $data = satuan::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function index(){
        return view('panel.owner.masterdata.satuan.index');
    }

    public function create(){
        return view('panel.owner.masterdata.satuan.form');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required|unique:satuans,nama',
            'nilai' => 'required|numeric'
        ]);

        $data = new satuan();
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->save();

        if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Satuan berhasil di Tambah'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Satuan Gagal di Proses'
            ]); 
        }
    }

    public function edit($id){
        $data = satuan::where('id',$id)->first();
         return view('panel.owner.masterdata.satuan.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $data = satuan::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();

        if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Satuan berhasil di Update'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Satuan Gagal di Proses'
            ]); 
        }
    }

    public function destroy($id){
        $data = satuan::where('id',$id)->first();
        $data->delete();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Satuan berhasil di Hapus'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Satuan Gagal di Proses'
           ]); 
       }

    }

}
