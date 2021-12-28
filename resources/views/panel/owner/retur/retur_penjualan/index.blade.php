@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Retur Penjualan</h4>

                    <a role="button" href="{{ route('owner.retur_penjualan.create') }}" class="btn btn-primary btn-sm mb-2">Tambah</a>
           
                        <table id="tb_retur_penjualan" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Supplier</th>
                                    <th>Tanggal</th>
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
