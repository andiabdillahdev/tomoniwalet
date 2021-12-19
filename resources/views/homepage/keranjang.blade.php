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
            <form id="formCheckout">
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
                                <input type="hidden" name="keranjang_id[]" class="keranjang-id" value="{{ $res->id }}">
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
                            <input type="hidden" class="keranjang-id" value="">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4" id="ringkasan_pesanan">
                        <h1>Ringkasan Pesanan</h1>
                        <div class="d-flex justify-content-between">
                            <p class="jumlah_item">{{ count($keranjang) }} item</p>
                            <span class="harga_produk">Rp{{ number_format($total) }}</span>
                        </div>
                        <h1>Pengiriman</h1>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi Tujuan</label>
                            <select class="form-control" id="provinsi" name="provinsi" required>
                                <option value="null">.::Pilih Provinsi::.</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota Tujuan</label>
                            <select class="form-control" id="kota" name="kota" required>
                                <option value="">.::Pilih provinsi terlebih dahulu::.</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" required="" placeholder="Alamat Lengkap.." name="alamat"></textarea>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label for="jasa_kirim" class="form-label">Jasa Kirim</label>
                                <select class="form-control" required id="jasa_kirim" name="jasa_kirim">
                                    <option value="">.::Pilih Jasa Kirim::.</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    {{-- <option value="tiki">TIKI</option> --}}
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="jasa_kirim" class="form-label">No. Telepon/WA</label>
                                <input type="number" class="form-control" name="telepon" required placeholder="No. Telepon/WA.." autocomplete="off">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p>Biaya Ongkir</p>
                            <span class="biaya_ongkir">Rp0</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Estimasi Waktu Pengiriman</p>
                            <span class="waktu_kirim">-</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Harga Total</p>
                            <span class="harga_total">Rp{{ number_format($total) }}</span>
                        </div>

                        <div class="d-flex">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <button type="submit" class="button button-primary btn" style="width: 100%;">Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
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
            $('.harga_produk').text(res.harga_total);
            
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var jasa_kirim = $('#jasa_kirim').val();
            if(!provinsi || !kota || !jasa_kirim) $('.harga_total').text(res.harga_total);

            getOngkir();
        });

        $(document).on('click', '.del-keranjang', function(event) {
            event.preventDefault();
            let keranjang_id = $(this).attr('data-id');
            let res = loadData.del_cart("{{ $user_id }}", keranjang_id);
            $(this).parents('.d-flex').remove();
            $('.jumlah_item').text(res.total_keranjang+' item');
            $('.harga_produk').text(res.harga_total);

            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var jasa_kirim = $('#jasa_kirim').val();
            if(provinsi || kota || jasa_kirim) $('.harga_total').text(res.harga_total);
            
            if (res.total_keranjang == 0) {
                $('#list-item-keranjang').html('<h5 class="text-center mt-5"><i>Belum ada keranjang ditmbahkan</i></h5>');
            }

            loadData.get_count_cart("{{ $user_id }}");
            getOngkir();
        });

        // get provinsi
        getLocation();

        // get kota
        $('#provinsi').change(function(event) {
            event.preventDefault();
            $('#kota').html('<option value="">.::Pilih Kota::.</option>');
            var province_id = $(this).val();
            getLocation(province_id);

        });

        // get ongkir
        $('#kota, #provinsi, #jasa_kirim').change(function(event) {
            event.preventDefault();
            getOngkir();
        });

        // checkout
        $('#formCheckout').submit(function (e) { 
            e.preventDefault();

            var provinsi = $("#provinsi option:selected").text();
            var kota = $("#kota option:selected").text();
            var data = $(this).serialize();
            data = data+"&provinsi_val="+provinsi+"&kota_val="+kota;
            let loadData = new homepage();
            loadData.checkout(data);
        });

        function getLocation(id=null) {
            $.ajax({
                type: "GET",
                url: "{{ url('/') }}/source/get-location",
                data: { id: id },
                success: function(response) {
                    var data = response.rajaongkir.results;
                    var provinsi, kota;

                    if (!id) provinsi = `<option value="null">.::Pilih Provinsi::.</option>`;
                    else kota = `<option value="">.::Pilih Kota::.</option>`;
                    $.each(data, function (key, val) {
                        if (!id)
                            provinsi += `<option value="${val.province_id}">${val.province}</option>`;
                        else
                            kota += `<option value="${val.city_id}">${val.city_name}</option>`;
                    });

                    if (!id) $('#provinsi').html(provinsi);
                    else $('#kota').html(kota);
                }
            });
        }

        function getOngkir() {
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var jasa_kirim = $('#jasa_kirim').val();
            var keranjang = $('.keranjang-id').val();

            if(provinsi && kota && jasa_kirim && keranjang) {
                var data = $('#formCheckout').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/') }}/get-ongkir-view",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    data: data,
                    success: function(res) {
                        console.log(res);
                        $('.biaya_ongkir').text(res.ongkir);
                        $('.waktu_kirim').text(res.estimasi);
                        $('.harga_total').text(res.harga_total);
                    }
                });
            }
        }
    });
</script>
@endpush