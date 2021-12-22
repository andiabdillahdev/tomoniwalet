@extends('layouts.layouts')

@section('content')
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

                        <table class="table dataTable">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Jasa Kirim</th>
                                    <th>Ongkir</th>
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

@push('scripts')
    <script>
        $(function() {
            var dataTable = $('.dataTable').DataTable();
            dataTable.clear().draw();
            dataTable.row.add([
                'no',
                'vl.kd_pemesanan',
                'vl.nama_pemesan',
                'vl.nama_pemesan',
                'vl.nama_alat',
                'vl.jumlah_hilang',
                'vl.tanggal_hilang',
                '<td class="text-center"><a href="#" class="btn btn-sm btn-default" id="set-alat-kembali" data-id="1" ><i class="fa fa-reply"></i> Telah Kembali</a> </td>'
            ]).draw(false);

            // $.ajax({
            //     url: host + "/api/inventori/getalathilang",
            //     method: "GET",
            //     headers: headers,
            //     success: function(data) {
            //         var tableAlatHilang = $('#tableAlatHilang').DataTable();
            //         tableAlatHilang.clear().draw();
            //         var no = 1;
            //         $.each(data.result, function(key, vl) {
            //             tableAlatHilang.row.add([
            //                 no,
            //                 vl.kd_pemesanan,
            //                 vl.nama_pemesan,
            //                 vl.nama_alat,
            //                 vl.jumlah_hilang,
            //                 vl.tanggal_hilang,
            //                 `<td class="text-center">
        //                         <a href="#" class="btn btn-sm btn-default" id="set-alat-kembali" data-id="` + vl
            //                 .id + `" ><i class="fa fa-reply"></i> Telah Kembali</a>
        //                         </td>`
            //             ]).draw(false);
            //             no = no + 1;
            //         });
            //     }
            // });
        });
    </script>
@endpush
