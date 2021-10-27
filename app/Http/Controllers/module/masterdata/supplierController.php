<?php

namespace App\Http\Controllers\module\masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\supplier;

class supplierController extends Controller
{

    public function getAll(){
        $data = supplier::all();
        return DataTables::of($data)->rawColumns([])->make(true);
    }

    public function index(){
        return view('panel.owner.masterdata.supplier.index');
    }

    public function automatic_kode(){
        $nomor = supplier::orderBy('id', 'desc')->first();
        if (empty($nomor)) {
            $result = 'TMW-SPL-'.'00' . 1;
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

    public function create(){
        $number = $this->automatic_kode();
        return view('panel.owner.masterdata.supplier.form',compact('number'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode' => 'required|unique:suppliers,kode',
            'nama' => 'required|unique:suppliers,nama',
        ]);

        $data = new supplier();
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->telepon = $request->telepon;
        $data->email = $request->email;
        $data->npwp = $request->npwp;
        $data->ktp = $request->ktp;
        $data->alamat = $request->alamat;
        $data->bank = $request->bank;
        $data->rekening = $request->rekening;
        $data->save();

        if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Supplier berhasil di Tambah'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Supplier Gagal di Proses'
            ]); 
        }

    }

    public function edit($id){
        $number = $this->automatic_kode();
        $data = supplier::where('id',$id)->first();
        return view('panel.owner.masterdata.supplier.edit',compact('number','data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $data = supplier::where('id',$id)->first();
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->telepon = $request->telepon;
        $data->email = $request->email;
        $data->npwp = $request->npwp;
        $data->ktp = $request->ktp;
        $data->alamat = $request->alamat;
        $data->bank = $request->bank;
        $data->rekening = $request->rekening;
        $data->save();

        if ($data) {
             return response()->json([
                 'status_code' => 200,
                 'message' => 'Data Supplier berhasil di Update'
             ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'message' => 'Data Supplier Gagal di Proses'
            ]); 
        }
    }

    public function destroy($id){
        $data = supplier::where('id',$id)->first();
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
