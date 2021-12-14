@extends('homepage.layouts.headfoot')
@section('konten_page')
@php
$user_id = Auth::user() ? Auth::user()->id : null;
$keranjang = new App\keranjang;
$keranjang = $keranjang->where('user_id', $user_id)->where('status', 'invalid')->get();
$total = 0;
@endphp
<div class="wrapper-content">

    <section class="section-list-keranjang">
        <div class="container">
            <div class="title-produk-list"> Keranjang <span class="jumlah_item">{{ count($keranjang) }} item</span> </div>
            <div class="row">

                <div class="col-lg-8" id="detail_produk">
                    <div class="d-flex">
                        <span>Detail Produk</span>
                        <span>Kuantiti</span>
                        <span>Total</span>
                    </div>
                    <div id="list-item-keranjang">
                        @foreach ($keranjang as $res)
                        <div class="d-flex">
                            <div class="item_detail">
                                <img src="{{ asset('uploads/produk/'.$res->produk->gambar_detail[0]->gambar) }}" alt="" style="height: 80px; width: 80px; margin-left: 25px;">
                                <div class="note_item_detail">
                                    <ul>
                                        <li>{{ $res->produk->nama }}</li>
                                        <li><b>Rp{{ number_format($res->produk->harga) }}</b></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="kuantiti">
                                <div class="custom_pos">
                                    <a href="#" class="text-dark btn-action" data-action="minus" produk-id="{{ $res->produk_id }}" data-id="{{ $res->id }}">
                                        <div class="group-auto plus_grid">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </a>
                                </div>
                                <input type="text" class="form-control val-kuantitas" value="{{ $res->kuantitas }}" readonly="">
                                <div class="custom_pos">
                                    <a href="#" class="text-dark btn-action" data-action="plus" produk-id="{{ $res->produk_id }}" data-id="{{ $res->id }}">
                                        <div class="group-auto minus_grid">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="sub_total_keranjang">Rp{{ number_format($res->produk->harga*$res->kuantitas) }}</div>
                            <a href="#" class="del-keranjang" data-id="{{ $res->id }}">
                                <div class="delete_">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </a>
                        </div>
                        @php
                        $total = $total + $res->produk->harga*$res->kuantitas;
                        @endphp
                        @endforeach

                        @if(!isset($res))
                        <h5 class="text-center mt-5"><i>Belum ada keranjang ditmbahkan</i></h5>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4" id="ringkasan_pesanan">
                    <h1>Ringkasan Pesanan</h1>
                    <div class="d-flex justify-content-between">
                        <p class="jumlah_item">{{ count($keranjang) }} item</p>
                        <span class="harga_total">Rp{{ number_format($total) }}</span>
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
                        <span class="harga_total">Rp{{ number_format($total) }}</span>
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
@push('page_script')
<script>
    $(function() {
        let loadData = new homepage();
        $(document).on('click', '.btn-action', function(event) {
            event.preventDefault();
            let action = $(this).attr('data-action');
            let produk_id = $(this).attr('produk-id');
            let keranjang_id = $(this).attr('data-id');
            let this_q = $(this).parents('.kuantiti').find('.val-kuantitas');
            let q = this_q.val();
            let value = 1;

            if (action == 'minus' && q != 1) value = parseInt(q)-1;
            else if (action == 'plus') value = parseInt(q)+1;
            this_q.val(value);

            let res = loadData.set_cart("{{ $user_id }}", produk_id, keranjang_id, value);

            $(this).parents('.d-flex').find('.sub_total_keranjang').text(res.total);
            $('.harga_total').text(res.harga_total);
        });

        $(document).on('click', '.del-keranjang', function(event) {
            event.preventDefault();
            let keranjang_id = $(this).attr('data-id');
            let res = loadData.del_cart("{{ $user_id }}", keranjang_id);
            $(this).parents('.d-flex').remove();
            $('.jumlah_item').text(res.total_keranjang+' item');
            $('.harga_total').text(res.harga_total);
            
            if (res.total_keranjang == 0) {
                $('#list-item-keranjang').html('<h5 class="text-center mt-5"><i>Belum ada keranjang ditmbahkan</i></h5>');
            }

            loadData.get_count_cart("{{ $user_id }}");
        });
    });
</script>
@endpush