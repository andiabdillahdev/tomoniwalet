@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
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
                    <h4 class="card-title">Tabel Produk</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-8">
                            <form id="form_produk" class="forms-sample">
                            <div class="form-group">
                                    <label for="kategori_">Kategori Produk</label>
                                    {{ Form::select('kategori_id',$kategori,null, ['title' => 'Pilih Kategori Produk','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_']) }}
                                    <small class="text-danger error-notif" id="kategori_id"></small>
                            </div>   
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1"
                                        placeholder="Nama">
                                    <small class="text-danger error-notif" id="nama"></small>
                                </div>
                                <div class="form-group">
                                    <label for="harga_">Harga</label>
                                    <input type="text" class="form-control currency_format" name="harga" id="harga_">
                                    <small class="text-danger error-notif" id="harga"></small>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="exampleInputEmail1">Berat</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="berat" placeholder="Berat"
                                                aria-label="Berat">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" type="button">Gram</button>
                                            </div>
                                        </div>
                                        <small class="text-danger error-notif" id="berat"></small>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="exampleInputEmail1">Garansi</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Recipient's username" name="garansi" aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" type="button">Bulan</button>
                                            </div>
                                        </div>
                                        <small class="text-danger error-notif" id="garansi"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="deskripsi_">Deskripsi</label>
                                            <textarea name="deskripsi" id="deskripsi_" class="form-control"
                                                rows="5"></textarea>
                                            <small class="text-danger error-notif" id="deskripsi"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                          
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="status" value="Aktif">
                                                        Aktif
                                                        <i class="input-helper"></i></label>
                                                </div>

                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="status" value="Tidak Aktif">
                                                        Tidak Aktif
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            
                                            <small class="text-danger error-notif" id="status"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gambar</label>
                                    <div class="text-center">
                                        <div class="mb-2" id="img-privew"
                                            style="border: dashed 2px; width: 200px; height:200px;">
                                            <br>        
                                            <p><strong>Preview Image</strong></p>
                                        </div>
                                    </div>
                                    <label class="btn btn-dark btn-sm" for="gambar_"><i class="fa fa-upload"></i> Upload
                                      Foto</label> <br>
                                    <input type="file" onchange="changeFoto(this,'img-privew')" name="gambar" style="display: none;" id="gambar_">
                                    <small class="text-danger error-notif" id="gambar"></small>
                                </div>

                                <button type="button" class="btn btn-primary mr-2"
                                    onclick="store_page('form_produk','owner/produk/store','owner/produk')">Submit</button>
                                <a href="{{ route('owner.produk.index') }}" role="button" class="btn btn-light">Cancel</a>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('.input-images').imageUploader();
            $('.selectpicker').selectpicker();
            currency('currency_format');
        })
    </script>
 @endpush
