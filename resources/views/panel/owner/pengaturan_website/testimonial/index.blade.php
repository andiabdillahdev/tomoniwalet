@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <!-- <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }} </h3> -->
                    <h6 class="font-weight-normal mb-0">Testimonial</h6>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Testimonial</h4>

                    <button type="button" onclick="overlayForm('owner/pengaturan-website/form_testimonial','Tambah Data Testimoni')" class="btn btn-primary btn-sm mb-2">Tambah</button>

   
                        <table id="tb_testi" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Text</th>
                                    <th>Status</th>
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
