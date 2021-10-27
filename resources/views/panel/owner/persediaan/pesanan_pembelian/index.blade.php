@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Pesanan Pembelian</h4>

                    <a role="button" href="{{ route('owner.persediaan.pesanan_pembelian.create') }}" class="btn btn-primary btn-sm mb-2">Tambah</a>

           
                        <table id="tb_pesanan_pembelian" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
