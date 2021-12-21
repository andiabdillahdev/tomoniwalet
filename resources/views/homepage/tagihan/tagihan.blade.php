@extends('homepage.layouts.headfoot')
@php
$user_id = Auth::user() ? Auth::user()->id : null;
$transaksi = new App\transaksi();
$transaksi = $transaksi
    ->where('user_id', $user_id)
    ->where('status', 'baru')
    ->get();
@endphp
@section('konten_page')
    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->
        <section class="section-list-tagihan">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-tml" id="content-bill">

                        @foreach ($transaksi as $dta)
                            <div class="row tagihan-item mt-3">
                                <div class="col-lg-2 col-12 tagihan-content">
                                    <label>Kode</label><br>
                                    <span>{{ $dta->kode }}</span>
                                </div>
                                <div class="col-lg-2 col-12 tagihan-content">
                                    <label>Tanggal</label><br>
                                    <span>{{ $dta->tanggal }}</span>
                                </div>
                                <div class="col-lg-2 col-12 tagihan-content">
                                    <label>Jasa Kirim</label><br>
                                    <span>{{ strtoupper($dta->jasa_kirim) }}</span>
                                </div>
                                <div class="col-lg-2 col-12 tagihan-content">
                                    <label>Total</label><br>
                                    <span>Rp{{ number_format($dta->total_harga) }}</span>
                                </div>
                                <div class="col-lg-2 col-12 tagihan-content">
                                    <a role="button" href="{{ url('/tagihan/bukti-pembayaran/' . $dta->kode) }}"
                                        class="btn button-sm button-primary">Upload Bukti Pembayaran</a><br>
                                    <small>
                                        <a href="javascript:;" class="btn-detail-tagihan"> Detail Transaksi</a>
                                    </small>
                                </div>

                                <div class="detail_tagihan_item detail-tagihan">

                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    @foreach ($dta->item as $itm)
                                        <div class="row mt-2 mb-2">
                                            <div class="col-lg-2 col-12 tagihan-content-detail">
                                                <label>Produk</label><br>
                                                <span>{{ $itm->detail->produk->nama }}</span>
                                            </div>
                                            <div class="col-lg-2 col-12 tagihan-content-detail">
                                                <label>Kuantitas</label><br>
                                                <span>{{ $itm->detail->kuantitas }}</span>
                                            </div>
                                            <div class="col-lg-2 col-12 tagihan-content-detail">
                                                <label>Harga</label><br>
                                                <span>Rp{{ number_format($itm->detail->produk->harga) }}</span>
                                            </div>
                                            <div class="col-lg-2 col-12 tagihan-content-detail">
                                                <label>Total</label><br>
                                                <span>Rp{{ number_format($itm->detail->produk->harga * $itm->detail->kuantitas) }}</span>
                                            </div>
                                        </div>
                                        <hr style="width: 60%;">
                                        @php
                                            $sub_total += $itm->detail->produk->harga * $itm->detail->kuantitas;
                                        @endphp
                                    @endforeach

                                    <div class="row mt-2">
                                        <div class="col-lg-3 offset-lg-7">
                                            <div class="d-flex justify-content-between">
                                                <p>Sub Total</p>
                                                <span
                                                    class="text-primary font-bold">Rp{{ number_format($sub_total) }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p>Ongkir</p>
                                                <span
                                                    class="text-primary font-bold">Rp{{ number_format($dta->biaya_ongkir) }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p>Total</p>
                                                <span
                                                    class="text-primary font-bold">Rp{{ number_format($dta->total_harga) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        @empty($dta)
                            <h4 class="text-center"><i>Belum ada tagihan</i></h4>
                        @endempty

                    </div>
                </div>
        </section>


    </div>
@endsection
@push('page_script')
    <script>
        $(function() {
            $('.btn-detail-tagihan').click(function(e) {
                e.preventDefault();
                $(this).parents('.tagihan-item').find('.detail-tagihan').slideToggle(500);
            });
        });
    </script>
@endpush
