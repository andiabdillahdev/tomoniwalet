<?php

namespace App\Http\Controllers\module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\hero_section;
use App\kategori_hero;
use App\kategori;
use App\testimonial;
use DataTables;
class pengaturanWebsiteController extends Controller
{
    public function jumbotron(){
        $hero = hero_section::all();
        $kategori_hero = kategori_hero::all();
        $kategori = $this->get_kategori();
        // return $kategori_hero;
        // return $hero;
        return view('panel.owner.pengaturan_website.jumbotron',compact('hero','kategori_hero','kategori'));
    }

    public function jumbotronStore(Request $request,$id){
        $this->validate($request, [
            'title_gambar_hero' => 'required',
            'text_hero' => 'required'
        ]);

       

        $data = hero_section::where('id',$id)->first();
        
        if (isset($request->gambar_hero)) {
            if ($request->hasFile('gambar_hero')) {
                $image = $request->file('gambar_hero');
                $filename = $image->getClientOriginalName();
                $image->move('uploads/page/hero_section',$filename);
                $data->gambar_hero = $filename;
            }
        }
        $data->title_gambar_hero = $request->title_gambar_hero;
        $data->text_hero = $request->text_hero;
        $data->save();

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

    public function hero_kategori(Request $request){
        // return $request;

        for ($i=0; $i < count($request->id); $i++) { 

            $data = kategori_hero::where('id',$request['id'][$i])->first();
            
            if (isset($request->gambar_kategori[$i])) {
                if ($request->hasFile('gambar_kategori')) {
                    $image = $request->file('gambar_kategori')[$i];
                    $filename = $image->getClientOriginalName()[$i];
                    $image->move('uploads/page/gambar_kategori',$filename);
                    $data->gambar_kategori = $filename;
                }
            }

            $data->id_kategori = $request->kategori_id[$i];
            $data->save();

        }
    }

    public function getAllTestimonial(){
        $data = testimonial::all();
        return DataTables::of($data)->rawColumns([])->make(true);   
    }

    public function testimonial(){
        return view('panel.owner.pengaturan_website.testimonial.index');
    }

    public function form_testimonial(){
        return view('panel.owner.pengaturan_website.testimonial.form');
    }

    public function post_testimonial(Request $request){
        // return $request;
        $this->validate($request, [
            'nama' => 'required',
            'status' => 'required',
            'text' => 'required',
            'image'=> 'required|max:2000|',
        ]);

       

        $data = new testimonial();
        
        if (isset($request->image)) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->move('uploads/testimonial',$filename);
                $data->image = $filename;
            }
        }
        $data->nama = $request->nama;
        $data->status = $request->status;
        $data->text = $request->text;
        $data->save();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Testimoni berhasil di Tambah'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Testimoni Gagal di Proses'
           ]); 
       }
    }

    public function editTestimoni($params){
        $data = testimonial::where('id',$params)->first();
        return view('panel.owner.pengaturan_website.testimonial.edit',compact('data'));
    }

    public function update_testimonial(Request $request,$id){
        $this->validate($request, [
            'nama' => 'required',
            'status' => 'required',
            'text' => 'required',
            'image'=> 'max:2000|',
        ]);

        $data = testimonial::where('id',$id)->first();
        
        if (isset($request->image)) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->move('uploads/testimonial',$filename);
                $data->image = $filename;
            }
        }

        $data->nama = $request->nama;
        $data->status = $request->status;
        $data->text = $request->text;
        $data->save();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Testimoni berhasil di Update'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Testimoni Gagal di Proses'
           ]); 
       }

    }

    public function deleteTestimoni($id){
        $data = testimonial::where('id',$id)->first();
        $data->delete();

        if ($data) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data Testimonial berhasil di Hapus'
            ]);
       }else{
           return response()->json([
               'status_code' => 422,
               'message' => 'Data Testimonial Gagal di Proses'
           ]); 
       }
    }
}
