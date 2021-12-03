<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
class homepageController extends Controller
{
    public function index(){
        return view('homepage.index');
    }

    public function tentang(){
        return view('homepage.tentang');
    }

    public function belanja_list(){
        return view('homepage.belanja.index');
    }

    public function produk_detail($params){
        return view('homepage.belanja.detail');
    }

    public function page_login(){
        return view('homepage.login');
    }

    public function page_register(){
        return view('homepage.register');
    }

    public function page_login_post(Request $request){

    }

    public function page_register_post(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);

        

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->save();

        if ($user) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Registrasi Berhasil'
            ]);
       }else{
           return response()->json([
               'message' => 'Registrasi Gagal di Proses'
           ],422); 
       }
    }

    public function kontak(){
        return view('homepage.kontak');
    }
}
