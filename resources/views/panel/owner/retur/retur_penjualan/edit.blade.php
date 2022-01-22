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
                    <h4 class="card-title">Form Tambah Retur Penjualan</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-10">
                            <form id="form_retur_penjualan" class="forms-sample">

                            <div class="mb-4">
                            <span class="text-muted small">Pilih Jenis Retur Penjualan</span>
                            <label class="custom-control teleport-switch">
                                <span class="teleport-switch-control-description">Transaksi Website</span>
                                <input type="checkbox" class="teleport-switch-control-input" onchange="changeForm(this)">
                                <span class="teleport-switch-control-indicator"></span>
                                <span class="teleport-switch-control-description">Transaksi Kasir</span>
                            </label>
                            </div>

                            <div class="form-group" id="pelanggan_website">
                                    <label for="kategori_">Pelanggan via Website</label>
                                    {{ Form::select('user_id',$user,null, ['title' => 'Pilih Pelanggan','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_']) }}
                                    <small class="text-danger error-notif" id="supplier"></small>
                            </div>   

                            <div class="form-group" id="pelanggan_kasir">
                                    <label for="customer_">Pelanggan via kasir</label>
                                    <input type="text" class="form-control" name="customer" id="customer_">
                                    <small class="text-danger error-notif" id="customer"></small>
                            </div>
                         
                            <div class="form-group">
                                    <label for="tanggal_">Tanggal</label>
                                    <input type="date" class="form-control" value="{{ $data['tanggal'] }}" name="tanggal" id="tanggal_">
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
                                    onclick="store_with_table('form_retur_penjualan','owner/retur-penjualan/update/{{$data['id']}}','owner/retur-penjualan')">Submit</button>
                                    <a href="{{ route('owner.retur_penjualan') }}" role="button" class="btn btn-light">Cancel</a>
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
            $('#pelanggan_kasir').hide();
            let data = {!! json_encode($data) !!}
            console.log(data['user_id']);

            if (data['user_id'] != null) {
                $('.teleport-switch-control-input').prop('checked', false);
                $('#pelanggan_website').show();
                    $('#pelanggan_kasir').hide();
                $('.selectpicker').selectpicker('val', data['user_id']);
            }else{
                $('.teleport-switch-control-input').prop('checked', true);
                $('#pelanggan_kasir').show();
                $('#pelanggan_website').hide();
                $('#customer_').val(data['customer']);
            }

            changeForm = (element) =>{
                if ($(element).is(':checked')) {
                    $('#pelanggan_kasir').show();
                    $('#pelanggan_website').hide();
                }else{
                    $('#pelanggan_website').show();
                    $('#pelanggan_kasir').hide();
                }
            }

            $.each(data['retur_penjualan_detail'], function (indexInArray, valueOfElement) { 
                $('#tb_general_persediaan').DataTable().row.add([
                        valueOfElement['produk']['id'],
                        valueOfElement['produk']['nama'],
                        `<input type="number" class="form-control form-control-sm jumlah" value="${valueOfElement.jumlah}">`,
                        `<input type="text" class="form-control form-control-sm" value="${valueOfElement.satuan}" placeholder="Masukkan Satuan">`,
                        `<input type="text" class="form-control form-control-sm currency_format harga" value="${valueOfElement.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}">`,
                        `<input type="text" class="form-control form-control-sm currency_format" value="${valueOfElement.total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}" readonly>`,
                        `<i class="ti-trash delete-table"></i>`
                    ]).draw();
            });

        })
    </script>
 @endpush
