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
                    <h4 class="card-title">Form Tambah Retur Pembelian</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-10">
                            <form id="form_retur_pembelian" class="forms-sample">
                            <div class="form-group">
                                    <label for="kategori_">Supplier/Pemasok</label>
                                    {{ Form::select('supplier',$supplier,null, ['title' => 'Pilih Supplier','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_']) }}
                                    <small class="text-danger error-notif" id="supplier"></small>
                                </div>   
                            <div class="form-group">
                                    <label for="tanggal_">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal_">
                                    <small class="text-danger error-notif" id="tanggal"></small>
                            </div>

                            <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="overlayForm('owner/pesanan-pembelian/detail-pesanan','Pilih Produk/Barang')">Tambah Produk/Barang</button>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            

                             

                                <button type="button" class="btn btn-primary mr-2"
                                    onclick="store_with_table('form_retur_pembelian','owner/retur-pembelian/store','owner/retur-pembelian')">Submit</button>
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

        })
    </script>
 @endpush
