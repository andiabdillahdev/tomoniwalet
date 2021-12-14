<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\kontak;

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
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credential)) {
            $auth = Auth::user();
            if ($auth->role == '3') {
                Auth::guard('web')->attempt($credential, $request->filled('remember'));
                return redirect('/');
            } else {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
            }
        }

        return redirect()->back()->withInput($request->only('email', 'password'))->withErrors(['error' => ['Email atau password yang anda masukkan salah!']]);
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

    public function page_logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function kontak(){
        return view('homepage.kontak');
    }

    public function storekontak(Request $request)
    {
        $post = kontak::create($request->all());

        if ($post) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Pesan Anda berhasil dikirim'
            ]);
        } else{
            return response()->json([
                'message' => 'Terjadi Kesalahan. Gagal di Proses'
            ],422); 
        }
    }

    public function keranjang(){
        return view('homepage.keranjang');
    }
}
