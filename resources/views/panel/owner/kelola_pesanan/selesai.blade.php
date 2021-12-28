@extends('layouts.layouts')

@section('content')
    @php
    $pesanan = new App\transaksi();
    $pesanan = $pesanan->where('status', '!=', 'selesai')->get();
    @endphp
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
                        <h4 class="card-title">Pesanan Selesai</h4>

                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Jasa Kirim</th>
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

    <div class="modal fade modal-detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-2 px-5 mx-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <b>Kode Pesanan: </b>
                                <span class="dtl dtl-kode"></span>
                            </div>
                            <div class="mb-2">
                                <b>Tanggal: </b>
                                <span class="dtl dtl-tanggal"></span>
                            </div>
                            <div class="mb-2">
                                <b>Nama: </b>
                                <span class="dtl dtl-nama"></span>
                            </div>
                            <div class="mb-2">
                                <b>Alamat: </b>
                                <span class="dtl dtl-alamat"></span>
                            </div>
                            <div class="mb-2">
                                <b>Telepon: </b>
                                <span class="dtl dtl-telepon"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <b>Jasa Kirim: </b>
                                <span class="dtl dtl-jasa_kirim"></span>
                            </div>
                            <div class="mb-2">
                                <b>Ongkos Kirim: </b>
                                <span class="dtl dtl-biaya_ongkir"></span>
                            </div>
                            <div class="mb-2">
                                <b>Provinsi Tujuan: </b>
                                <span class="dtl dtl-provinsi"></span>
                            </div>
                            <div class="mb-2">
                                <b>Kota Tujuan: </b>
                                <span class="dtl dtl-kota"></span>
                            </div>
                            <div class="mb-2">
                                <b>Total Harga: </b>
                                <span class="dtl dtl-total_harga"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-center"><u>Item Pesanan</u></h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                                <th>Berat</th>
                            </tr>
                        </thead>
                        <tbody id="tabelItem">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" style="margin-top: -20px;">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-proccess" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-0">
                    <h4 class="text-center">Foto Bukti Pembayaran</h4>
                    <div class="border">
                        <img style="height: 100%; width: 100%" id="foto_bukti">
                    </div>
                </div>
                <div class="text-center pb-4">
                    <hr>
                    <button type="button" class="btn btn-success proccess-action" data-target="selesai">Proses
                        Pesanan</button>
                    <button type="button" class="btn btn-danger proccess-action" data-target="batal">Tolak Pesanan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            let host = $('meta[name="host_url"]').attr("content");

            $(document).on('click', '.btn-detail', function(e) {
                e.preventDefault();

                $('.dtl').text('-');
                let data_id = $(this).attr('data-id');
                $.ajax({
                    url: host + "/owner/pesanan/getdetail",
                    method: "GET",
                    data: {
                        id: data_id
                    },
                    success: function(data) {
                        $.each(data, function(key, val) {
                            $('.dtl-' + key).text(val);
                        });

                        var item;
                        $.each(data.item_barang, function(i, itm) {
                            item += `
                            <tr>
                                <td>` + itm.kode_barang + `</td>
                                <td>` + itm.nama_barang + `</td>
                                <td>` + itm.kuantitas + `</td>
                                <td>` + itm.harga + `</td>
                                <td>` + itm.total + `</td>
                                <td>` + itm.berat + `</td>
                            </tr>`;
                        });
                        $('#tabelItem').html(item);
                    }
                });
            });

            getData();

            function getData() {
                $("#dataTable").dataTable().fnDestroy();
                $("#dataTable").DataTable({
                    bLengthChange: true,
                    bFilter: true,
                    bInfo: true,
                    bAutoWidth: true,
                    searching: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: host + "/owner/pesanan/getallfinish",
                        async: true,
                        error: function(res) {},
                    },
                    deferRender: true,
                    responsive: !0,
                    colReorder: !0,
                    pagingType: "full_numbers",
                    stateSave: !1,
                    language: {
                        zeroRecords: "Belum ada data...",
                        processing: '<span class="text-danger">Mengambil Data....</span>',
                    },
                    columns: [{
                        data: 'kode',
                        name: 'kode',
                        orderable: false,
                    }, {
                        data: 'tanggal',
                        name: 'tanggal',
                        orderable: false,
                    }, {
                        data: 'nama',
                        name: 'nama',
                        orderable: false,
                    }, {
                        data: 'alamat',
                        name: 'alamat',
                        orderable: false,
                    }, {
                        data: 'telepon',
                        name: 'telepon',
                        orderable: false,
                    }, {
                        data: 'jasa_kirim',
                        name: 'jasa_kirim',
                        orderable: false,
                    }, {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }, ]
                });
            }
        });
    </script>
@endpush
