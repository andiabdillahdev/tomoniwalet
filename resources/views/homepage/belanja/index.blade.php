@extends('homepage.layouts.headfoot')
@section('konten_page')
    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->

        <div class="sub-header">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="sub-header-item-1">
                        <span>Semua Produk</span>
                    </div>
                    <div class="d-flex sub-header-item-2">

                        <select class="form-control form-select-sub-header kategoriContent" style="margin-right: 8px;">
                            <option value="">Pilih Kategori Produk</option>
                        </select>

                        <select class="form-control form-select-sub-header">
                            <option selected>Harga Terendah</option>
                            <option selected>Harga Tertinggi</option>
                            <option selected>Harga Paling Laku</option>
                        </select>

                    </div>
                </div>
            </div>
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
            loadData.belanja();
            loadData.get_kategori();

            $(document).on('click', '.add-cart', function(event) {
                event.preventDefault();

                if (!is_auth) {
                    notif('warning', 'Anda harus login terlebih dahulu');
                } else {
                    var produk_id = $(this).attr('produk-id');
                    loadData.add_cart(user_id, produk_id, 1);
                }
            });

        });
    </script>
@endpush
