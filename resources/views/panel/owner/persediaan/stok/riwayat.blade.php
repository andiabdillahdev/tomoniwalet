@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Stok Masuk</h4>
                        <table id="tb_masuk" class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Stok Keluar</h4>
                        <table id="tb_keluar" class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis Transaksi</th>
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
        $(function () {
            let html = '';
            let tabel_keluar = '';
            let host = $('meta[name="host_url"]').attr("content");
            $('.selectpicker').selectpicker();
            currency('currency_format');
            let pesanan_pembelian = {!! json_encode($pesanan_pembelian) !!};
            let barang_keluar = {!! json_encode($barang_keluar) !!};
            console.log(pesanan_pembelian);

            if (pesanan_pembelian.length > 0) {
                $.each(pesanan_pembelian, function (indexInArray, valueOfElement) { 
                html += `<tr>
                            <td>${valueOfElement['pesanan_pembelian_header']['tanggal']}</td>
                            <td>Pesanan Pembelian</td>
                            <td><a href="${host}/owner/pesanan-pembelian/edit/${valueOfElement.id_pesanan_pembelian_header}" role="button" class="btn btn-primary btn-sm">Lihat Transaksi</a></td>
                        </tr>`;
                });
            }else{
                html = '<div class="text-center">Belum ada data</div>';
            }

            if (barang_keluar.length > 0) {
                $.each(barang_keluar, function (index, value) { 
                tabel_keluar += '<tr>';
                tabel_keluar += `<td>${value['tanggal']}</td>`;
                tabel_keluar += `<td>${value['jenis_tagihan']}</td>`;
                if (value.mode == 'kasir') {
                    tabel_keluar += `<td><a href="${host}/owner/retail-penjualan/detail_transaksi/${value.id}" role="button" class="btn btn-primary btn-sm">Lihat Transaksi</a></td>`;
                }else{
                    tabel_keluar += `<td><a href="${host}/owner/retur-pembelian/edit/${value.id}" role="button" class="btn btn-primary btn-sm">Lihat Transaksi</a></td>`;
                }
                tabel_keluar += '</tr>';
            });
            } else {
                tabel_keluar = '<div class="text-center">Belum ada data</div>';
            }

            $('#tb_masuk tbody').append(html);
            $('#tb_keluar tbody').append(tabel_keluar);
            // pesanan_pembelian

        })
    </script>
 @endpush

