@extends('homepage.layouts.headfoot')
@section('konten_page')
<div class="wrapper-content">

    <section class="section-list-keranjang">
        <div class="container">
            <div class="title-produk-list"> Keranjang <span>3 item</span> </div>
            <div class="row">

                <div class="col-lg-8" id="detail_produk">
                    <div class="d-flex">
                        <span>Detail Produk</span>
                        <span>Kuantiti</span>
                        <span>Total</span>
                    </div>
                    <div id="list-item-keranjang">
                        <div class="d-flex">
                            <div class="item_detail">
                                <img src="{{ asset('assets/img/cart_img.png') }}" alt="">
                                <div class="note_item_detail">
                                    <ul>
                                        <li>Nama Produk</li>
                                        <li><b>Rp. 10.000</b></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="kuantiti">
                                <div class="custom_pos">
                                    <div class="group-auto plus_grid"><i class="fas fa-plus"></i></div>
                                </div>
                                <input type="text" class="form-control">
                                <div class="custom_pos">
                                    <div class="group-auto minus_grid"><i class="fas fa-minus"></i></div>
                                </div>
                            </div>
                            <div class="sub_total_keranjang">Rp100.000,-</div>
                            <div class="delete_">
                            <i class="fas fa-trash"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4" id="ringkasan_pesanan">
                    <h1>Ringkasan Pesanan</h1>
                    <div class="d-flex justify-content-between">
                        <p>3 item</p>
                        <span>Rp100.000,-</span>
                    </div>
                    <div class="mb-3">
                        <label for="jasa_kirim" class="form-label">Jasa Kirim</label>
                        <select class="form-control">
                            <option value="JNT">JNT</option>
                            <option value="POS">POS</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Harga Total</p>
                        <span>Rp100.000,-</span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn button button-primary text-left">Checkout</button>
                    </div>

                    

                </div>

            </div>
        </div>
    </section>
</div>
@endsection