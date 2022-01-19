<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\kontak;
use App\keranjang;
use App\produk;
use App\transaksi;
use App\transaksi_detail;
use App\kategori;
use Hash;

class homepageController extends Controller
{
    public function index()
    {
        return view('homepage.index');
    }

    public function tentang()
    {
        return view('homepage.tentang');
    }

    public function belanja_list()
    {
        $kategori_mobile = [];
        $kategori = kategori::all();
        $count_take = count($kategori)- 4;
        $kategori_limit = kategori::skip(0)->take(4)->get();
        $kategori_limit_other = kategori::skip(5)->take($count_take)->get();
        foreach ($kategori as $key => $value) {
            $produk = produk::where('kategori_id',$value->id)->get();
            if (count($produk)>0) {
                $kategori_mobile[$key] = [
                    'id' => $value->id,
                    'nama' => $value->nama,
                    'jumlah' => count($produk)
                ];
            }
        }
        return view('homepage.belanja.index',compact('kategori_mobile','kategori_limit','kategori_limit_other'));
    }

    public function produk_detail($params)
    {
        $produk = produk::where('kode', $params)->first();
        return view('homepage.belanja.detail', compact('produk'));
    }

    public function page_login()
    {
        return view('homepage.login');
    }

    public function page_register()
    {
        return view('homepage.register');
    }

    public function page_login_post(Request $request)
    {
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

    public function page_register_post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);



        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = '3';
        $user->password =  bcrypt($request->password);
        $user->save();

        if ($user) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Registrasi Berhasil'
            ]);
        } else {
            return response()->json([
                'message' => 'Registrasi Gagal di Proses'
            ], 422);
        }
    }

    public function page_logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function kontak()
    {
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
        } else {
            return response()->json([
                'message' => 'Terjadi Kesalahan. Gagal di Proses'
            ], 422);
        }
    }

    public function keranjang()
    {
        return view('homepage.keranjang');
    }

    public function storecart(Request $request)
    {
        $cek = keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->where('status', 'invalid')->first();
        if ($cek) {
            $cek->kuantitas = $cek->kuantitas + 1;
            $cek->save();
        } else {
            keranjang::create($request->all());
        }

        return response()->json([
            'status_code' => 200,
            'message' => 'Produk berhasil ditambahkan ke keranjang'
        ]);
    }

    public function setcart(Request $request)
    {
        $data = keranjang::where('id', $request->keranjang_id)->first();
        $data->kuantitas = $request->kuantitas;
        $data->save();

        $total = 'Rp' . number_format($data->produk->harga * $data->kuantitas);

        $get_total = 0;
        $get_keranjang = keranjang::where('user_id', $request->user_id)->where('status', 'invalid')->get();

        foreach ($get_keranjang as $dta) {
            $get_total = $get_total + $dta->produk->harga * $dta->kuantitas;
        }

        $harga_total = 'Rp' . number_format($get_total);

        return response()->json([
            'total' => $total,
            'harga_total' => $harga_total
        ]);
    }

    public function delcart(Request $request)
    {
        $data = keranjang::where('id', $request->keranjang_id)->first();
        $data->delete();

        $get_total = 0;
        $get_keranjang = keranjang::where('user_id', $request->user_id)->where('status', 'invalid')->get();

        foreach ($get_keranjang as $dta) {
            $get_total = $get_total + $dta->produk->harga * $dta->kuantitas;
        }

        $harga_total = 'Rp' . number_format($get_total);

        return response()->json([
            'total_keranjang' => count($get_keranjang),
            'harga_total' => $harga_total
        ]);
    }

    public function getongkirview(Request $request)
    {
        $ongkir = $this->getongkir($request);
        $estimasi = str_replace(' HARI', '', $ongkir['etd']);

        return response()->json([
            'ongkir' => "Rp" . number_format($ongkir['ongkir']),
            'estimasi' => $estimasi . " Hari",
            'harga_total' => "Rp" . number_format($ongkir["harga_total"]),
        ]);
    }

    public function checkout(Request $request)
    {
        $data = $request->all();
        $ongkir = $this->getongkir($request);
        $trs = transaksi::orderBy('id', 'desc')->first();
        $last_id = $trs ? $trs->id : '0';
        $data['kode'] = "TML-" . sprintf('%03s', $last_id) . date('-d-Y');
        $data["tanggal"] = date('Y-m-d');
        $data["biaya_ongkir"] = $ongkir["ongkir"];
        $data["total_harga"] = $ongkir["harga_total"];
        $data["provinsi"] = $request->provinsi_val;
        $data["kota"] = $request->kota_val;
        $data["status"] = 'baru';
        unset($data["keranjang_id"]);
        unset($data["provinsi_val"]);
        unset($data["kota_val"]);

        $crt = transaksi::create($data);
        foreach ($request->keranjang_id as $krj) {
            transaksi_detail::create([
                "transaksi_header_id" => $crt->id,
                "keranjang_id" => $krj
            ]);

            $updt = keranjang::where('id', $krj)->first();
            $updt->status = "valid";
            $updt->save();
        }

        return $crt->id;
    }

    public function transaksi_view($id)
    {
        dd($id);
    }

    protected function getongkir($request)
    {
        $berat = 0;
        foreach ($request->keranjang_id as $krj) {
            $krj = keranjang::where('id', $krj)->first();
            $berat += ($krj->produk->berat * $krj->kuantitas);
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=245&destination=" . $request->kota . "&weight=" . $berat . "&courier=" . $request->jasa_kirim,
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
                "key: 35fbb9c26760769e9a5874c20ad90004"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $result = json_decode($response);
        $result = $result->rajaongkir->results[0]->costs[0]->cost[0];

        $get_total = 0;
        $get_keranjang = keranjang::where('user_id', $request->user_id)->where('status', 'invalid')->get();
        foreach ($get_keranjang as $dta) {
            $get_total = $get_total + $dta->produk->harga * $dta->kuantitas;
        }
        $harga_total = $result->value + $get_total;

        $return = [
            "ongkir" => $result->value,
            "etd" => $result->etd,
            "harga_total" => $harga_total
        ];

        return $return;
    }

    public function tagihanOrder()
    {
        return view('homepage.tagihan.tagihan');
    }

    public function buktiPembayaran($params)
    {
        $id = null;
        $kode = null;
        $total_harga = null;
        $trs = transaksi::where('kode', $params)->first();
        if ($trs) {
            $id = $trs->id;
            $kode = $trs->kode;
            $total_harga = $trs->total_harga;
        }
        return view('homepage.tagihan.bukti_pembayaran', compact('id', 'kode', 'total_harga'));
    }

    public function upload_foto_bayar(Request $request)
    {
        $file = $request->file('foto_pembayaran');
        $nama_file = $request->kode . '-' . date('m-d-his') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/bukti_pembayaran'), $nama_file);

        $trs = transaksi::where('id', $request->id)->first();
        $trs->foto_pembayaran = $nama_file;
        $trs->status = 'upload';
        $trs->save();

        return back()->with('success', true);
    }

    public function riwayatPesanan()
    {
        return view('homepage.riwayat');
    }

    public function getDetailPesanan(Request $request)
    {
        $data = transaksi::where('id', $request->id)->first();
        $data['tanggal'] = date('d/m/Y', strtotime($data->tanggal));
        $data['nama'] = $data->user->name;
        $data['jasa_kirim'] = strtoupper($data->jasa_kirim);
        $data['biaya_ongkir'] = 'Rp' . number_format($data->biaya_ongkir);
        $data['total_harga'] = 'Rp' . number_format($data->total_harga);

        $item = [];
        foreach ($data->item as $itm) {
            // var_dump($itm->detail->produk->kode);
            $item[] = [
                "kode_barang" => $itm->detail->produk->kode,
                "nama_barang" => $itm->detail->produk->nama,
                "kuantitas" => $itm->detail->kuantitas,
                "harga" => 'Rp' . number_format($itm->detail->produk->harga),
                "total" => 'Rp' . number_format($itm->detail->produk->harga * $itm->detail->kuantitas),
                "berat" => $itm->detail->produk->berat . ' gram',
            ];
        }
        $data['item_barang'] = $item;
        return $data;
    }

    public function profil()
    {
        return view('homepage.profil');
    }

    public function editProfil(Request $request)
    {
        $cek_email = User::where('email', $request->email)->where('id', '!=', $request->id)->first();
        if ($cek_email) {
            return response()->json([
                'type' => 'warning',
                'message' => 'Email sudah terdaftar',
            ]);
        }

        $updt = User::where('id', $request->id)->first();
        $updt->name = $request->name;
        $updt->email = $request->email;
        $updt->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Profil berhasil diupdate',
        ]);
    }
}