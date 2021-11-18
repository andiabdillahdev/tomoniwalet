@extends('layouts.layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <!-- <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }} </h3> -->
                    <h6 class="font-weight-normal mb-0">Kasir Tomoniwalet.com</h6>
                    <a href="{{ route('staff.riwayat') }}" role="button" class="btn btn-primary btn-sm btn-icon-text mt-3">
                        <i class="mdi mdi-history"></i>
                            Riwayat Kasir
                     </a>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Kelola Kasir</p>
                    <div class="container">
                        <div class="row mt-2 mb-4">
                            {{ Form::select('produk',$produk,null, ['title' => 'Cari Produk','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'produk_kasir_get']) }}
                        </div>
                    </div>

                    <table class="table table-bordered" id="tb_kasir">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Barang</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form id="form_detail_kasir">
                    <p class="card-title">Pesanan Details</p>
                    <div id="list_checkout">

                    </div>

                    <hr>
                    <div class="d-flex justify-content-between" id="total">
                        <p class="text-dark font-weight-medium">Total</p>
                        <span class="text-primary font-weight-bold"></span>
                        <input type="hidden" name="total" id="total_" value="0">
                    </div>
                    <div class="d-flex justify-content-between" id="nominal_cash">
                        <p class="text-dark font-weight-medium" style="position: relative;top: 11px;">Nominal Cash</p>
                        <input type="text" name="cash" class="currency_format form-control form-control-sm" value="0"
                            style="width:40%">
                    </div>
                    <div class="d-flex justify-content-between mt-2" id="nominal_kembalian">
                        <p class="text-dark font-weight-medium" style="position: relative;top: 11px;">Kembalian</p>
                        <input type="text" name="kembalian" class="currency_format form-control form-control-sm" value="0"
                            style="width:40%" readonly>
                    </div>
                    
                    </form>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-primary btn-sm btn-icon-text" id="saveKasir">
                            <i class="ti-file btn-icon-prepend"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scriptss')
    <script>
        $(function () {
            $('.selectpicker').selectpicker();
            currency('currency_format');

        })
    </script>
 @endpush