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
                    <h4 class="card-title">Form Update Pesanan Pembelian</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-10">
                            <form id="form_pesanan_pembelian" class="forms-sample">
                            <div class="form-group">
                                    <label for="kategori_">Supplier/Pemasok</label>
                                    {{ Form::select('supplier',$supplier,$data['id_supplier'], ['title' => 'Pilih Supplier','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_']) }}
                                    <small class="text-danger error-notif" id="supplier"></small>
                                </div>   
                            <div class="form-group">
                                    <label for="kode_">Kode</label>
                                    <input type="text" class="form-control" name="kode" id="kode_"
                                        placeholder="Nama" value="{{$data['kode']}}">
                                    <small class="text-danger error-notif" id="kode"></small>
                            </div>
                            <div class="form-group">
                                    <label for="tanggal_">Tanggal</label>
                                    <input type="date" class="form-control" value="{{$data['tanggal']}}" name="tanggal" id="tanggal_">
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
                                    onclick="store_with_table('form_pesanan_pembelian','owner/pesanan-pembelian/update/{{$data['id']}}','owner/pesanan-pembelian')">Submit</button>
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
            let data = {!! json_encode($data['pesanan_pembelian_detail']) !!};
            console.log(data);
            if (data.length > 0) {
                $.each(data, function (indexInArray, valueOfElement) { 
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
            }

        })
    </script>
 @endpush
