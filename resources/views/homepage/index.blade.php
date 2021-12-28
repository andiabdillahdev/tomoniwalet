@extends('homepage.layouts.headfoot')
@section('konten_page')
    <div class="wrapper-content">
        <section id="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 banner-hero">
                        <h1></h1>
                        <p></p>
                        <button class="btn button button-primary"> <svg width="16" height="18" viewBox="0 0 16 18"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.67 10.4794L15.9831 3.68955C16.0779 3.19931 15.7609 2.73248 15.3331 2.73248H4.42245L4.16783 1.26974C4.10439 0.905143 3.83139 0.643311 3.5147 0.643311H0.666667C0.298472 0.643311 0 0.994063 0 1.42675V1.94904C0 2.38173 0.298472 2.73248 0.666667 2.73248H2.60786L4.5592 13.9433C4.09236 14.2588 3.77778 14.8504 3.77778 15.5287C3.77778 16.5383 4.47422 17.3567 5.33333 17.3567C6.19245 17.3567 6.88889 16.5383 6.88889 15.5287C6.88889 15.017 6.70981 14.5548 6.42156 14.2229H12.2451C11.9569 14.5548 11.7778 15.017 11.7778 15.5287C11.7778 16.5383 12.4742 17.3567 13.3333 17.3567C14.1924 17.3567 14.8889 16.5383 14.8889 15.5287C14.8889 14.8049 14.5309 14.1795 14.0117 13.8833L14.1649 13.0908C14.2598 12.6006 13.9427 12.1338 13.5149 12.1338H6.05881L5.877 11.0892H14.0199C14.3312 11.0892 14.601 10.8361 14.67 10.4794Z"
                                    fill="white" />
                            </svg>
                            Belanja Sekarang</button>
                    </div>
                    <div class="col-lg-5">
                        <img src="{{ asset('assets/img/img-banner.png') }}" id="img-banner-hero">
                    </div>
                </div>
            </div>
        </section>



        <section id="kategori_area">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="card-kategori bg-blue-old">
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('assets/img/img-kategori1.png') }}" alt="" srcset="">
                            </div>
                            <div class="custom-position">
                                <h1>Kategori</h1>
                                <button class="btn button button-light custom-position-button">Lihat Produk</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-kategori bg-blue-kid">
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('assets/img/img-kategori1.png') }}" alt="" srcset="">
                            </div>
                            <div class="custom-position">
                                <h1>Kategori</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-kategori bg-blue-old">
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('assets/img/img-kategori1.png') }}" alt="" srcset="">
                            </div>
                            <div class="custom-position">
                                <h1>Kategori</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="card-kategori bg-blue-kid">
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('assets/img/img-kategori1.png') }}" alt="" srcset="">
                            </div>
                            <div class="custom-position">
                                <h1>Kategori</h1>
                                <button class="btn button button-light custom-position-button">Selengkapnya</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-kategori bg-blue-old">
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('assets/img/img-kategori1.png') }}" alt="" srcset="">
                            </div>
                            <div class="custom-position">
                                <h1>Kategori</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-kategori bg-blue-kid">
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('assets/img/img-kategori1.png') }}" alt="" srcset="">
                            </div>
                            <div class="custom-position">
                                <h1>Kategori</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="section-first">
            <div class="header_content text-center">
                <h1>Produk Terbaru</h1>
                <h3>Produk terbaru minggu ini</h3>
            </div>
            <div class="container">
                <div id="produk_terbaru" class="row card-area">
                    
                </div>
                <div class="d-flex justify-content-end">
                    <div class="readmore">Lihat Selengkapnya <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.172 8.99995L5.92552e-07 8.99995L7.67397e-07 6.99995L12.172 6.99995L6.808 1.63595L8.222 0.221954L16 7.99995L8.222 15.778L6.808 14.364L12.172 8.99995Z"
                                fill="#23A7E0" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRODUK TERLARIS -->

        <section class="section-first">
            <div class="header_content text-center">
                <h1>Produk Terlaris</h1>
                <h3>Produk terlaris minggu ini</h3>
            </div>
            <div class="container">
                <div class="row card-area">
                    <div class="col-lg-3">
                        <div class="card-tml content-card">
                            <img src="{{ asset('assets/img/produk.png') }}" alt="" srcset="">
                            <div class="d-flex justify-content-center">
                                <span>Kategori Produk</span>
                            </div>
                            <h1>Nama Produk</h1>
                            <p>Rp 10.000</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn button-sm button-primary">Lihat</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-tml content-card">
                            <img src="{{ asset('assets/img/produk.png') }}" alt="" srcset="">
                            <div class="d-flex justify-content-center">
                                <span>Kategori Produk</span>
                            </div>
                            <h1>Nama Produk</h1>
                            <p>Rp 10.000</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn button-sm button-primary">Lihat</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-tml content-card">
                            <img src="{{ asset('assets/img/produk.png') }}" alt="" srcset="">
                            <div class="d-flex justify-content-center">
                                <span>Kategori Produk</span>
                            </div>
                            <h1>Nama Produk</h1>
                            <p>Rp 10.000</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn button-sm button-primary">Lihat</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-tml content-card">
                            <img src="{{ asset('assets/img/produk.png') }}" alt="" srcset="">
                            <div class="d-flex justify-content-center">
                                <span>Kategori Produk</span>
                            </div>
                            <h1>Nama Produk</h1>
                            <p>Rp 10.000</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn button-sm button-primary">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="readmore">Lihat Selengkapnya <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.172 8.99995L5.92552e-07 8.99995L7.67397e-07 6.99995L12.172 6.99995L6.808 1.63595L8.222 0.221954L16 7.99995L8.222 15.778L6.808 14.364L12.172 8.99995Z"
                                fill="#23A7E0" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimoni -->

        <section id="testimoni" class="section-first">
            <div class="header_content text-center">
                <h1>Testimonial</h1>
                <h3>Lihat apa yang mereka katakan tentang kami</h3>
            </div>
            <div class="container owl-carousel">
                <div class="testimonial-content text-center">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/img/testi.png') }}" alt="" srcset="">
                    </div>

                    <h1>Rival Harfah S.kom</h1>
                    <span>Juragan Walet Makassar</span>
                    <div class="d-flex justify-content-center">
                        <div class="hr_line"></div>
                    </div>
                    <p>“is simply dummy text of the printing and typesetting industry. Lorem Ipsum “</p>
                </div>
                <div class="testimonial-content text-center">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/img/testi2.png') }}" alt="" srcset="">
                    </div>
                    <h1>Andi Abdillah</h1>
                    <span>Web Developer</span>
                    <div class="d-flex justify-content-center">
                        <div class="hr_line"></div>
                    </div>
                    <p>“is simply dummy text of the printing and typesetting industry. Lorem Ipsum “</p>
                </div>
            </div>
        </section>

    </div>
    @endsection
    @push('page_script')
        <script>
            $(function() {
                let owl = $('.owl-carousel');
                owl.owlCarousel({
                    items:1,
                    loop:true,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:1800,
                    autoplayHoverPause:true
                });

                let loadData = new homepage();

                loadData.hero_section();
                loadData.produk_terbaru();
                loadData.produk_terlaris();
                loadData.testimonial();

            })
           
        </script>
    @endpush