<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;

class kategoriController extends Controller
{
    public function index()
    {
        $data = kategori::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tampilkan',
            'status_code' => 200,
            'data' => $data
        ]);

    }
 
    public function show($id)
    {
        // $post = auth()->user()->posts()->find($id);
 
        // if (!$post) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post not found '
        //     ], 400);
        // }
 
        // return response()->json([
        //     'success' => true,
        //     'data' => $post->toArray()
        // ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required'
        ]);
 
        $post = new kategori();
        $post->kode = $request->kode;
        $post->nama = $request->nama;
 
        if ($post->save())
            return response()->json([
                'success' => true,
                'data' => $post->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post not added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        // $post = auth()->user()->posts()->find($id);
 
        // if (!$post) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post not found'
        //     ], 400);
        // }
 
        // $updated = $post->fill($request->all())->save();
 
        // if ($updated)
        //     return response()->json([
        //         'success' => true
        //     ]);
        // else
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post can not be updated'
        //     ], 500);
    }
 
    public function destroy($id)
    {
        // $post = auth()->user()->posts()->find($id);
 
        // if (!$post) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post not found'
        //     ], 400);
        // }
 
        // if ($post->delete()) {
        //     return response()->json([
        //         'success' => true
        //     ]);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Post can not be deleted'
        //     ], 500);
        // }
    }
}
