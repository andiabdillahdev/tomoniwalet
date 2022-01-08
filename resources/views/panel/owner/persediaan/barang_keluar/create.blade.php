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
                    <h4 class="card-title">Form Tambah Barang Keluar</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-10">
                        <p class="card-description">FORM PILIH PENGIRIMAN PESANAN</p>
                      
                        <div class="mb-4">
                                <span class="text-muted small">Pilih Jenis Barang Keluar</span>
                                <label class="custom-control teleport-switch">
                                    <span class="teleport-switch-control-description">Pengiriman Pesanan </span>
                                    <input type="checkbox" class="teleport-switch-control-input"
                                        onchange="changeForm(this)">
                                    <span class="teleport-switch-control-indicator"></span>
                                    <span class="teleport-switch-control-description">Retur Pembelian</span>
                                </label>
                            </div>

                            <div class="form-group" id="retur_pembelian_">
                                <label for="kategori_">Pilih Pelanggan</label>
                                {{ Form::select('user_id',$user,null, ['title' => 'Pilih Pelanggan','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'pelanggan_']) }}
                                <small class="text-danger error-notif" id="supplier"></small>
                            </div>

                            <div class="form-group" id="pengiriman_pesanan_">
                                <label for="customer_">Pilih Pemasok</label>
                                {{ Form::select('pemasok_id',$supplier,null, ['title' => 'Pilih Pemasok','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'pemasok_']) }}
                            </div>

                        <div class="d-flex justify-content-start">

                            <div id="button_retur_">
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="overlayTransaksiVendor('pelanggan_','owner/barang-keluar/detailPengiriman','Pilih Pengiriman Pesanan','barang_keluar','pengiriman')">Tambah Produk/Barang Pengiriman</button>
                            </div>

                            <div id="button_pengiriman_">
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="overlayTransaksiVendor('pemasok_','owner/barang-keluar/detailRetur','Pilih Pemasok','barang_keluar','retur')">Tambah Produk/Barang Retur</button>
                            </div>

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

                            <form id="form_pengiriman_pesanan" class="forms-sample mt-3">
                            
                           

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
                            <input type="hidden" id="id_header_retur" name="id_header_retur">

                                <button type="button" class="btn btn-primary mr-2"
                                    onclick="store_page('form_pengiriman_pesanan','owner/barang-keluar/store','owner/barang-keluar')">Submit</button>
                                <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
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
            $('#pengiriman_pesanan_').hide();
            $('#button_pengiriman_').hide();

        changeForm = (element) =>{
            if ($(element).is(':checked')) {
                $('#pengiriman_pesanan_').show();
                $('#button_pengiriman_').show();
                $('#retur_pembelian_').hide();
                $('#button_retur_').hide();
            }else{
                $('#retur_pembelian_').show();
                $('#button_retur_').show();
                $('#pengiriman_pesanan_').hide();
                $('#button_pengiriman_').hide();
            }
        }

        })
    </script>
 @endpush
