@extends('homepage.layouts.headfoot')
@section('konten_page')
    @php
    $get_kat = new App\kategori();
    if (isset($_GET['kat_id'])) {
        $kategori = $get_kat->where('kode', $_GET['kat_id'])->first();
        $kat_id = $kategori ? $kategori->id : null;
    }
    @endphp
    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->

        <div class="sub-header">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="sub-header-item-1">
                        <span id="title-view">Semua Produk</span>
                    </div>
                    
                    @foreach($kategori_limit as $x => $y)
                    <div class="sub-header-menu">
                        <span id="title-view"><a data-value="{{$y['id']}}">{{$y['nama']}}</a></span>
                    </div>
                    @endforeach
                
                    <div id="mobile-kategori-menu" class="kategori_menu_toogle">
                        <span id="title-view">Kategori</span>
                    </div>
                    <div class="d-flex sub-header-item-2">

                        <select class="form-control form-select-sub-header kategoriContent" style="margin-right: 8px;">
                            <option value="all">Kategori Lainnya</option>
                            @foreach ($kategori_limit_other as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                            @endforeach
                        </select>

                        <select class="form-control form-select-sub-header byPrice">
                            <option value="">.::Kategori Harga::.</option>
                            <option value="down">Harga Terendah</option>
                            <option value="up">Harga Tertinggi</option>
                            <option value="many">Produk Paling Laku</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>

        <div id="menu-mobile-group">
            
            @foreach($kategori_mobile as $key =>$value)
            <div class="d-flex justify-content-between item-list-mobile" data-value="{{$value['id']}}">
                <p>{{$value['nama']}}</p>
                <span>{{$value['jumlah']}} Produk <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.03057 4.97568L0.00408579 0.682487L0.0572779 9.34258L6.03057 4.97568Z" fill="#C4C4C4" fill-opacity="0.65"/></svg></span>
            </div>
            @endforeach
        
        <!-- <div class="d-flex justify-content-between item-list-mobile">
                <p>Tweeter Kobble</p>
                <span>12 Produk <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.03057 4.97568L0.00408579 0.682487L0.0572779 9.34258L6.03057 4.97568Z" fill="#C4C4C4" fill-opacity="0.65"/></svg></span>
            </div>
            <div class="d-flex justify-content-between item-list-mobile">
                <p>Ampli Betavo</p>
                <span>12 Produk <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.03057 4.97568L0.00408579 0.682487L0.0572779 9.34258L6.03057 4.97568Z" fill="#C4C4C4" fill-opacity="0.65"/></svg></span>
            </div> -->
        </div>

        <section class="section-list-belanja">
            <div class="container">

                <div class="title-produk-list"> Menampilkan <span>50 produk</span> </div>

                <div class="row card-area" id="contentBelanja">

                </div>
                <div class="d-flex justify-content-end">
                    <div class="readmore">Read More <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.172 8.99995L5.92552e-07 8.99995L7.67397e-07 6.99995L12.172 6.99995L6.808 1.63595L8.222 0.221954L16 7.99995L8.222 15.778L6.808 14.364L12.172 8.99995Z"
                                fill="#23A7E0" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
@push('page_script')
    <script>
        $(function() {
            var is_auth, user_id;
            @if (Auth::user())
                is_auth = true;
                user_id = "{{ Auth::user()->id }}";
            @else
                is_auth = false;
            @endif

            let owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1800,
                autoplayHoverPause: true
            });

            let loadData = new homepage();
            // loadData.get_kategori();

            $(document).on('click', '.add-cart', function(event) {
                event.preventDefault();

                if (!is_auth) {
                    notif('warning', 'Anda harus login terlebih dahulu');
                } else {
                    var produk_id = $(this).attr('produk-id');
                    loadData.add_cart(user_id, produk_id, 1);
                }
            });

            $('.sub-header-menu a').on('click',function (e) {
                e.preventDefault();
                var value = $(this).attr('data-value');

                if (value == 'all') {
                    loadData.belanja('kat');
                } else {
                    loadData.belanja('kat', value);
                }
            })

            $('.item-list-mobile').on('click',function () {
                $('#menu-mobile-group').slideToggle(500);
                var value = $(this).attr('data-value');

                    if (value == 'all') {
                        loadData.belanja('kat');
                    } else {
                        loadData.belanja('kat', value);
                    }
            })

            $('.kategoriContent').change(function(e) {
                e.preventDefault();

                var value = $(this).val();

                if (value == 'all') {
                    loadData.belanja('kat');
                } else {
                    loadData.belanja('kat', value);
                }
            });

            $('.byPrice').change(function(e) {
                e.preventDefault();

                var value = $(this).val();

                if (value == '') {
                    loadData.belanja('kat');
                } else {
                    loadData.belanja('price', value);
                }
            });

            @if (isset($kat_id))
                loadData.belanja('kat', '{{ $kat_id }}');
                $(document).find('.kategoriContent').val('{{ $kat_id }}');
            @else
                loadData.belanja('kat');
            @endif

            $('.kategori_menu_toogle').on('click',function () {
                $('#menu-mobile-group').slideToggle(500);
            })

        });
    </script>
@endpush
