@extends('homepage.layouts.headfoot')
@section('konten_page')
<div class="wrapper-content">
    <!-- PRODUK TERLARIS -->

    <section class="section-list-other">

        <div id="kontak">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Kontak</h1>
                        <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer </p>
                        <h2>Kontak Kami</h2>
                        <ul>
                            <li> <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M4.02222 8.65556C5.62222 11.8 8.2 14.3667 11.3444 15.9778L13.7889 13.5333C14.0889 13.2333 14.5333 13.1333 14.9222 13.2667C16.1667 13.6778 17.5111 13.9 18.8889 13.9C19.5 13.9 20 14.4 20 15.0111V18.8889C20 19.5 19.5 20 18.8889 20C8.45556 20 0 11.5444 0 1.11111C0 0.5 0.5 0 1.11111 0H5C5.61111 0 6.11111 0.5 6.11111 1.11111C6.11111 2.5 6.33333 3.83333 6.74444 5.07778C6.86667 5.46667 6.77778 5.9 6.46667 6.21111L4.02222 8.65556Z"
                                fill="#333333" />
                            </svg> &nbsp; +62 000 0000 0000</li>
                            <li><svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M7 9.5C6.33696 9.5 5.70107 9.23661 5.23223 8.76777C4.76339 8.29893 4.5 7.66304 4.5 7C4.5 6.33696 4.76339 5.70107 5.23223 5.23223C5.70107 4.76339 6.33696 4.5 7 4.5C7.66304 4.5 8.29893 4.76339 8.76777 5.23223C9.23661 5.70107 9.5 6.33696 9.5 7C9.5 7.3283 9.43534 7.65339 9.3097 7.95671C9.18406 8.26002 8.99991 8.53562 8.76777 8.76777C8.53562 8.99991 8.26002 9.18406 7.95671 9.3097C7.65339 9.43534 7.3283 9.5 7 9.5ZM7 0C5.14348 0 3.36301 0.737498 2.05025 2.05025C0.737498 3.36301 0 5.14348 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 5.14348 13.2625 3.36301 11.9497 2.05025C10.637 0.737498 8.85652 0 7 0Z"
                                fill="#333333" />
                            </svg> &nbsp;&nbsp; Yasin Limpo Street, Gowa, South Sulawesi, Indonesia</li>
                            <li> <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M18 4L10 9L2 4V2L10 7L18 2V4ZM18 0H2C0.89 0 0 0.89 0 2V14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H18C18.5304 16 19.0391 15.7893 19.4142 15.4142C19.7893 15.0391 20 14.5304 20 14V2C20 1.46957 19.7893 0.960859 19.4142 0.585786C19.0391 0.210714 18.5304 0 18 0Z"
                                fill="#333333" />
                            </svg> &nbsp;&nbsp; mail@soupedia.com</li>  
                        </ul>
                        <h2>Jam Kerja</h2>
                        <ul>
                            <li> <img src="{{ asset('assets/img/jam.png') }}" alt="" srcset=""> &nbsp; Senin - Sabtu, 08.00 - 22.00</li>
                            <li> <img src="{{ asset('assets/img/jam.png') }}" alt="" srcset=""> &nbsp; Minggu, 10.00 - 21.00</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-kontak">
                            <form id="formKontak">
                                <div class="row row-group">
                                    <label for="nama_" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-general" id="nama_" name="nama" required="">
                                    </div>
                                </div>
                                <div class="row row-group">
                                    <label for="email_" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-general" id="email_" name="email" required="">
                                    </div>
                                </div>
                                <div class="row row-group">
                                    <label for="perihal_" class="col-sm-2 col-form-label">Perihal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-general" id="perihal_" name="perihal" required="">
                                    </div>
                                </div>
                                <div class="row row-group">
                                    <label for="perihal_" class="col-sm-2 col-form-label">Pesan</label>
                                    <div class="col-sm-10">
                                        <textarea name="pesan" required="" class="form-control form-general" rows="3"></textarea>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-center row-group">
                                <button onclick="post_auth('formKontak','store-kontak', 'kontak')" class="tm_button tm_primary tm-md">Kirim</button>
                            </div>
                        </div>
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
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:1800,
            autoplayHoverPause:true
        });
    })

</script>
@endpush
