<?php

namespace App\Http\Controllers\module\pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\transaksi;

class pesananController extends Controller
{
    public function view($page) {
        return view('panel.owner.kelola_pesanan.'.$page);
    }

    public function getAll(){
        $data = transaksi::where('status', 'baru')->orWhere('status', 'upload')->orderBy('status', 'desc')->get();

        return DataTables::of($data)->addColumn('tanggal', function($dta) {
                return date('d/m/Y', strtotime($dta->tanggal));
            })->addColumn('nama', function($dta) {
                return $dta->user->name;
            })->addColumn('jasa_kirim', function($dta) {
                return strtoupper($dta->jasa_kirim);
            })->addColumn('ongkir', function($dta) {
                return 'Rp'.number_format($dta->biaya_ongkir);
            })->addColumn('status', function($dta) {
                $color = ($dta->status == 'baru') ? 'success' : 'warning';
                return '<span class="badge badge-'.$color.' w-100">'.strtoupper($dta->status).'</span>';
			})->addColumn('action', function($dta) {
                $disabled = ($dta->status == 'baru') ? 'disabled' : '';
                return '<div class="text-center">
				<button type="button" class="btn btn-success btn-proccess" '.$disabled.' data-toggle="modal" data-target=".modal-proccess" data-id="'.$dta->id.'">Proses</button>
				<button type="button" class="btn btn-info btn-detail" data-toggle="modal" data-target=".modal-detail" data-id="'.$dta->id.'">Detail</button>
				</div>';
			})->rawColumns(['action', 'status'])->toJson();
    }

    public function getAllFinish(){
        $data = transaksi::where('status', 'selesai')->orWhere('status', 'batal')->orderBy('tanggal', 'desc')->get();

        return DataTables::of($data)->addColumn('tanggal', function($dta) {
                return date('d/m/Y', strtotime($dta->tanggal));
            })->addColumn('nama', function($dta) {
                return $dta->user->name;
            })->addColumn('jasa_kirim', function($dta) {
                return strtoupper($dta->jasa_kirim);
            })->addColumn('ongkir', function($dta) {
                return 'Rp'.number_format($dta->biaya_ongkir);
            })->addColumn('status', function($dta) {
                $color = ($dta->status == 'selesai') ? 'success' : 'danger';
                return '<span class="badge badge-'.$color.' w-100">'.strtoupper($dta->status).'</span>';
			})->addColumn('action', function($dta) {
                $disabled = ($dta->status == 'baru') ? 'disabled' : '';
                return '<div class="text-center">
				<button type="button" class="btn btn-info btn-detail" data-toggle="modal" data-target=".modal-detail" data-id="'.$dta->id.'">Detail</button>
				</div>';
			})->rawColumns(['action', 'status'])->toJson();
    }

    public function getDetail(Request $request) {
        $data = transaksi::where('id', $request->id)->first();
        $data['tanggal'] = date('d/m/Y', strtotime($data->tanggal));
        $data['nama'] = $data->user->name;
        $data['jasa_kirim'] = strtoupper($data->jasa_kirim);
        $data['biaya_ongkir'] = 'Rp'.number_format($data->biaya_ongkir);
        $data['total_harga'] = 'Rp'.number_format($data->total_harga);
        
        $item = [];
        foreach ($data->item as $itm) {
            // var_dump($itm->detail->produk->kode);
            $item[] = [
                "kode_barang" => $itm->detail->produk->kode,
                "nama_barang" => $itm->detail->produk->nama,
                "kuantitas" => $itm->detail->kuantitas,
                "harga" => 'Rp'.number_format($itm->detail->produk->harga),
                "total" => 'Rp'.number_format($itm->detail->produk->harga * $itm->detail->kuantitas),
                "berat" => $itm->detail->produk->berat.' gram',
            ];
        }
        $data['item_barang'] = $item;
        return $data;
    }

    public function getFotoBukti(Request $request) {
        $data = transaksi::where('id', $request->id)->first();
        return $data->foto_pembayaran;
    }
    
    public function proses(Request $request) {
        $data = transaksi::where('id', $request->id)->first();
        $data->status = $request->target;
        $data->save();
        return response()->json([
            'type' => 'success',
            'message' => 'Pesanan berhasil diproses'
        ]);
    }
}