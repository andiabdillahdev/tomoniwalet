@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <!-- <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }} </h3> -->
                    <h6 class="font-weight-normal mb-0">Retail Penjualan</h6>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail</h4>

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                            <table id="tb_detail" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Produk / Barang</th>
                                        <th>Kuantitas</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-3 offset-lg-9" id="header_first">
                                
                            </div>
                        </div>

                        
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('owner.retail_penjualan') }}" role="button" class="btn btn-sm btn-secondary">Kembali</a>
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
            let data = {!! json_encode($data) !!}
            let detail = {!! json_encode($detail) !!}
            let html_header = '';
            let row_html = '';
            console.log(data);
            console.log(detail);
            html_header = `<div class="d-flex justify-content-between">
                                    <p>Kasir</p>
                                    <span class="text-primary">${data.staff['name']}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Kode</p>
                                    <span class="text-primary">${data.kode}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Tanggal</p>
                                    <span class="text-primary">${data.tanggal}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Cash</p>
                                    <span class="text-primary">Rp. ${data.cash.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Kembalian</p>
                                    <span class="text-primary">Rp. ${data.kembalian.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p>Total</p>
                                    <span class="text-primary font-weight-bold">Rp. ${data.total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</span>
                                </div>
                                `;

            $.each(detail, function (indexInArray, valueOfElement) { 
                row_html += `<tr>
                                <td>${valueOfElement.produk['kode']}</td>
                                <td>${valueOfElement.produk['nama']}</td>
                                <td>${valueOfElement.kuantitas}</td>
                                <td>Rp. ${valueOfElement.produk['harga'].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</td>
                            </tr>`;
            });   
             
            $('#tb_detail tbody').append(row_html);
            $('#header_first').html(html_header);
        })
    </script>
 @endpush