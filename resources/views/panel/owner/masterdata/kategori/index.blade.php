@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <!-- <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }} </h3> -->
                    <h6 class="font-weight-normal mb-0">Ini Adalah Panel Administrator <span
                            class="text-primary">Tomoniwalet.com</span></h6>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Kategori</h4>

                    <button type="button" onclick="overlayForm('owner/kategori/create','Tambah Data Kategori')"
                        class="btn btn-primary btn-sm mb-2">Tambah</button>

           
                        <table id="tb_kategori" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
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
