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
                    <h4 class="card-title">Form Update Barang Keluar</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-10">
                        <p class="card-description">FORM PILIH PENGIRIMAN PESANAN</p>
                        <div class="form-group mt-3">
                                <label for="supplier_">Pelanggan</label>
                                <input type="text" id="pelanggan" class="form-control" value="{{$data['pengiriman_pesanan_header']['pelanggan']}}" readonly>
                        </div> 
                        
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="overlayTransaksiVendor('supplier_','owner/barang-keluar/detailPengiriman','Pilih Pengiriman Pesanan','barang_keluar')">Tambah Produk/Barang</button>
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
                                        placeholder="Nama" value="{{$data['kode']}}">
                                    <small class="text-danger error-notif" id="kode"></small>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="tanggal_">Tanggal</label>
                                     <input type="date" class="form-control" name="tanggal" value="{{$data['tanggal']}}" id="tanggal_">
                                    <small class="text-danger error-notif" id="tanggal"></small>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="keterangan_">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="{{$data['keterangan']}}" id="keterangan_"
                                        placeholder="Nama" >
                                    <small class="text-danger error-notif" id="keterangan"></small>
                                </div>
                                
                            </div>

                            <input type="hidden" id="id_header_transaksi" name="barang" value="{{$data['id_pengiriman_pesanan_header']}}">

                                <button type="button" class="btn btn-primary mr-2"
                                    onclick="store_page('form_pengiriman_pesanan','owner/barang-keluar/update/{{$data['id']}}','owner/barang-keluar')">Submit</button>
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
            let detail = {!! json_encode($detail) !!}
            console.log(detail)
            $.each(detail, function (indexInArray, valueOfElement) { 
                $('#tb_general_persediaan').DataTable().row.add([
                    valueOfElement.id,
                    valueOfElement.produk['nama'],
                    valueOfElement.jumlah,
                    valueOfElement.satuan,
                    valueOfElement.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"),
                    valueOfElement.total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"),
                ]).draw();
            });
        })
    </script>
 @endpush
