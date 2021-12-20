@extends('homepage.layouts.headfoot')
@section('konten_page')
<div class="wrapper-content">
    <!-- PRODUK TERLARIS -->



    <section class="section-list-tagihan">
        <div class="container">

            <div class="col-md-12">
                <div class="card-tml" id="content-bill">
                   
                </div>
            </div>
    </section>


</div>
@endsection
@push('page_script')
<script>
    $(function () {
        let host = $('meta[name="host_url"]').attr("content");
        let html = '';

        html += `<div class="row tagihan-item mt-2">
                        <div class="col-lg-2 col-12 tagihan-content">
                            <label>Kode</label><br>
                            <span>TML-343-23</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content">
                            <label>Tanggal</label><br>
                            <span>21-09-2021</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content">
                            <label>Jasa Kirim</label><br>
                            <span>JNE</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content">
                            <label>Total</label><br>
                            <span>Rp 10.0000</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content">
                            <a role="button" href="${host}/tagihan/bukti-pembayaran/TML-343-23"
                                class="btn button-sm button-primary">Upload Bukti Pembayaran</a><br>
                            <small><a href="javascript:;" onclick="detail_toogle('0')"> Detail
                                    Transaksi</a></small>
                        </div>
                        <div class="detail_tagihan_item" id="detail_0">`;

                        html +=  `<div class="row mt-2">
                        <div class="col-lg-2 col-12 tagihan-content-detail">
                            <label>Produk</label><br>
                            <span>Nama Produk</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content-detail">
                            <label>Kuantitas</label><br>
                            <span>1</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content-detail">
                            <label>Harga</label><br>
                            <span>0</span>
                        </div>
                        <div class="col-lg-2 col-12 tagihan-content-detail">
                            <label>Total</label><br>
                            <span>Rp. 0</span>
                        </div>
                    </div>`;

                    html +=  `<div class="row mt-2">
                        <div class="col-lg-3 offset-lg-7">
                            <div class="d-flex justify-content-between">
                                <p>Sub Total</p>
                                <span class="text-primary font-bold">Rp.0</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Ongkir</p>
                                  <span class="text-primary font-bold">Rp.0</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Total</p>
                                  <span class="text-primary font-bold">Rp.0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;


        $('#content-bill').append(html);

        detail_toogle = (params) =>{
            $(`#detail_${params}`).slideToggle(500);
        }
    });
</script>
@endpush
