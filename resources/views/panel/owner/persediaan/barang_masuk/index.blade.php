@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Barang Masuk</h4>

                    <a role="button" href="{{ route('owner.persediaan.barangmasuk.create') }}" class="btn btn-primary btn-sm mb-2">Tambah</a>

           
                        <table id="tb_barang_masuk" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
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
