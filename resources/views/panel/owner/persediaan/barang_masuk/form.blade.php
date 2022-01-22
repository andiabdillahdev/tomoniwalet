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
                    <h4 class="card-title">Form Tambah Barang Masuk</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-10">
                        <p class="card-description">FORM PILIH PESANAN PEMBELIAN</p>
                        <div class="form-group mt-3">
                                    <label for="supplier_">Supplier/Pemasok</label>
                                    {{ Form::select('supplier',$supplier,null, ['title' => 'Pilih Supplier','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'supplier_']) }}
                                    <small class="text-danger error-notif" id="supplier"></small>
                        </div> 
                        
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="overlayTransaksiVendor('supplier_','owner/barang-masuk/bysupplier','Pilih Pesanan Pembelian','barang_masuk')">Tambah Produk/Barang</button>
                            </div>


                            <table id="tb_general_persediaan" class="table mb-5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <small class="text-danger error-notif" id="barang"></small>

                            <hr>

                            <p class="card-description">FORM BARANG MASUK</p>

                            <form id="form_pesanan_pembelian" class="forms-sample mt-3">
                            
                           

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kode_">Kode</label>
                                    <input type="text" class="form-control" name="kode" id="kode_"
                                        placeholder="Nama" value="{{$kode}}">
                                    <small class="text-danger error-notif" id="kode"></small>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="tanggal_">Tanggal</label>
                                     <input type="date" class="form-control" name="tanggal" id="tanggal_">
                                    <small class="text-danger error-notif" id="tanggal"></small>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="keterangan_">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" id="keterangan_"
                                        placeholder="Nama" >
                                    <small class="text-danger error-notif" id="keterangan"></small>
                                </div>
                                
                            </div>

                            <input type="hidden" id="id_header_transaksi" name="barang">

                                <button type="button" class="btn btn-primary mr-2"
                                    onclick="store_page('form_pesanan_pembelian','owner/barang-masuk/store','owner/barang-masuk')">Submit</button>
                                    <a href="{{ route('owner.persediaan.barangmasuk.index') }}" role="button" class="btn btn-light">Cancel</a>
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
            $('.selectpicker').selectpicker();
            currency('currency_format');

        })
    </script>
 @endpush
