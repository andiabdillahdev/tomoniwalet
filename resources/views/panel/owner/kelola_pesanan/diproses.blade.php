@extends('layouts.layouts')

@section('content')
@php
$pesanan = new App\transaksi;
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
                        <h4 class="card-title">Tabel Produk</h4>

                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Jasa Kirim</th>
                                    <th>Ongkir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $dta)
                                <tr>
                                    <td>{{ $dta->kode }}</td>
                                    <td>{{ date('d/m/Y', strtotime($dta->tanggal)) }}</td>
                                    <td>{{ $dta->user->name }}</td>
                                    <td>{{ $dta->alamat }}</td>
                                    <td>{{ $dta->telepon }}</td>
                                    <td>{{ strtoupper($dta->jasa_kirim) }}</td>
                                    <td>Rp{{ number_format($dta->biaya_ongkir) }}</td>
                                    <td>{{ strtoupper($dta->status) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection

    @push('scripts')
    <script>
        $(function() {
            var dataTable = $('#dataTable').DataTable();
            dataTable.clear().draw();
            // dataTable.row.add([
            //     'no',
            //     'vl.kd_pemesanan',
            //     'vl.nama_pemesan',
            //     'vl.nama_pemesan',
            //     'vl.nama_alat',
            //     'vl.jumlah_hilang',
            //     'vl.tanggal_hilang',
            //     '<td class="text-center"><a href="#" class="btn btn-sm btn-default" id="set-alat-kembali" data-id="1" ><i class="fa fa-reply"></i> Telah Kembali</a> </td>'
            // ]).draw(false);


            tb_supplier = $("#dataTable").DataTable({
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                bAutoWidth: true,
                searching: true,
                processing: true,
                serverSide: true,
                
                deferRender: true,
                responsive: !0,
                colReorder: !0,
                pagingType: "full_numbers",
                stateSave: !1,
                language: {
                    zeroRecords: "Belum ada data...",
                    processing: '<span class="text-danger">Mengambil Data....</span>',
                },
                columns: [
                { data: "id" },
                { data: "kode" },
                { data: "nama" },
                { data: "telepon" },
                { data: null },
                ],
                columnDefs: [
                {
                    defaultContent: "-",
                    targets: "_all",
                },
                {
                    targets: 0,
                    className: "dt-left",
                    orderable: false,
                    searchable: false,
                    visible: false,
                },
                {
                    targets: -1,
                    title: "Actions",
                    orderable: false,
                    searchable: false,
                    width: "250px",
                    sClass: "text-center",
                    render: function (data) {
                        return `<button class="btn btn-warning mr-2" onclick="overlayForm('owner/supplier/edit/${data.id}','Update Data Supplier')" ><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger mr-2" onclick="delete_data('owner/supplier/destroy/${data.id}','tb_supplier')"><i class="fa fa-trash"></i> Hapus</button>`;
                    },
                },
                ],
            });
        });
    </script>
    @endpush
