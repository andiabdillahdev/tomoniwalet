@php
$user_id = Auth::user() ? Auth::user()->id : null;
$transaksi = new App\transaksi();
$transaksi = $transaksi
    ->where('user_id', $user_id)
    ->where('status', 'baru')
    ->get();
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="host_url" content="{{ url('/') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/OwlCarousel/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/lightbox/src/css/lightbox.css') }}">

    <title>Tomoniwalet</title>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <div class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" srcset="">
            </div>

            <div class="second_nav">
                <!-- <div class="d-flex justify-content-between"> -->
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active">
                            <a href="{{ route('homepage.index') }}">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ route('homepage.tentang') }}">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="{{ route('homepage.belanja_list') }}">Belanja</a>
                        </li>
                        <li>
                            <a href="{{ route('homepage.kontak') }}">Kontak</a>
                        </li>
                    </ul>
                </nav>
                <div id="form-search">
                    <input type="text" name="nama" placeholder="Cari..." class="form-control form-search"
                        id="namalengkap">
                    <div class="icon-search">
                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_135_600" fill="white">
                                <path
                                    d="M11.0125 1.80158C8.61107 -0.600528 4.70327 -0.600528 2.30148 1.80158C-0.100493 4.20308 -0.100493 8.11119 2.30148 10.5129C4.62088 12.8323 8.34467 12.9112 10.7603 10.7509L11.2487 11.2394C11.1271 11.5507 11.1908 11.9175 11.4422 12.1689L14.019 14.7458C14.3578 15.0847 14.9072 15.0847 15.2458 14.7458C15.5847 14.4072 15.5847 13.8579 15.2458 13.5188L12.6692 10.9424C12.4176 10.6906 12.0507 10.6269 11.7394 10.7487L11.251 10.2602C13.4117 7.84457 13.332 4.12065 11.0125 1.80158ZM3.03757 9.77693C1.04173 7.78126 1.04173 4.53332 3.03757 2.53741C5.03323 0.541507 8.28096 0.541507 10.2768 2.53741C12.2726 4.53332 12.2726 7.78122 10.2768 9.77693C8.28096 11.7726 5.03323 11.7726 3.03757 9.77693Z" />
                            </mask>
                            <path
                                d="M11.0125 1.80158C8.61107 -0.600528 4.70327 -0.600528 2.30148 1.80158C-0.100493 4.20308 -0.100493 8.11119 2.30148 10.5129C4.62088 12.8323 8.34467 12.9112 10.7603 10.7509L11.2487 11.2394C11.1271 11.5507 11.1908 11.9175 11.4422 12.1689L14.019 14.7458C14.3578 15.0847 14.9072 15.0847 15.2458 14.7458C15.5847 14.4072 15.5847 13.8579 15.2458 13.5188L12.6692 10.9424C12.4176 10.6906 12.0507 10.6269 11.7394 10.7487L11.251 10.2602C13.4117 7.84457 13.332 4.12065 11.0125 1.80158ZM3.03757 9.77693C1.04173 7.78126 1.04173 4.53332 3.03757 2.53741C5.03323 0.541507 8.28096 0.541507 10.2768 2.53741C12.2726 4.53332 12.2726 7.78122 10.2768 9.77693C8.28096 11.7726 5.03323 11.7726 3.03757 9.77693Z"
                                fill="#798A96" />
                            <path
                                d="M2.30148 1.80158L30.583 30.0886L30.5876 30.084L2.30148 1.80158ZM2.30148 10.5129L30.586 -17.7712L30.584 -17.7732L2.30148 10.5129ZM10.7603 10.7509L39.0505 -17.5275L12.3004 -44.2886L-15.9042 -19.0652L10.7603 10.7509ZM11.2487 11.2394L48.5064 25.795L58.0181 1.44795L39.5388 -17.039L11.2487 11.2394ZM11.4422 12.1689L-16.8441 40.4511L-16.8424 40.4529L11.4422 12.1689ZM14.019 14.7458L42.3125 -13.5292L42.3036 -13.5382L14.019 14.7458ZM15.2458 14.7458L-13.0225 -13.5545L-13.0389 -13.5381L-13.0553 -13.5217L15.2458 14.7458ZM15.2458 13.5188L43.5365 -14.7591L43.5286 -14.7669L15.2458 13.5188ZM12.6692 10.9424L-15.6259 39.2158L-15.6198 39.222L-15.6137 39.2281L12.6692 10.9424ZM11.7394 10.7487L-16.5504 39.0274L1.94663 57.5317L26.3123 47.9996L11.7394 10.7487ZM11.251 10.2602L-18.5626 -16.4072L-43.7808 11.7864L-17.0387 38.5389L11.251 10.2602ZM3.03757 2.53741L31.3223 30.8212L31.3235 30.82L3.03757 2.53741ZM10.2768 2.53741L-18.0082 30.821L-18.008 30.8212L10.2768 2.53741ZM10.2768 9.77693L-18.0066 -18.5083L-18.0067 -18.5082L10.2768 9.77693ZM39.3008 -26.4786C21.2763 -44.5083 -7.96268 -44.5052 -25.9847 -26.4808L30.5876 30.084C17.3692 43.3042 -4.05416 43.3073 -17.2758 30.0818L39.3008 -26.4786ZM-25.98 -26.4855C-44.0072 -8.46179 -44.0057 20.7764 -25.981 38.7989L30.584 -17.7732C43.8048 -4.55403 43.8062 16.868 30.583 30.0886L-25.98 -26.4855ZM-25.983 38.7969C-8.55838 56.2218 19.2894 56.7856 37.4249 40.567L-15.9042 -19.0652C-2.6001 -30.9631 17.8001 -30.5572 30.586 -17.7712L-25.983 38.7969ZM-17.5298 39.0293L-17.0414 39.5179L39.5388 -17.039L39.0505 -17.5275L-17.5298 39.0293ZM-26.009 -3.31607C-31.6643 11.1598 -28.7958 28.4978 -16.8441 40.4511L39.7285 -16.1133C51.1774 -4.66277 53.9185 11.9417 48.5064 25.795L-26.009 -3.31607ZM-16.8424 40.4529L-14.2655 43.0298L42.3036 -13.5382L39.7267 -16.1151L-16.8424 40.4529ZM-14.2745 43.0208C1.68314 58.9889 27.5793 58.9998 43.5469 43.0132L-13.0553 -13.5217C2.23513 -28.8303 27.0324 -28.8194 42.3125 -13.5292L-14.2745 43.0208ZM43.514 43.0461C59.5077 27.0705 59.4754 1.18712 43.5365 -14.7591L-13.0449 41.7966C-28.306 26.5286 -28.3382 1.74394 -13.0225 -13.5545L43.514 43.0461ZM43.5286 -14.7669L40.952 -17.3433L-15.6137 39.2281L-13.0371 41.8044L43.5286 -14.7669ZM40.9643 -17.3311C29.0089 -29.2956 11.6553 -32.1704 -2.83354 -26.5022L26.3123 47.9996C12.446 53.4242 -4.17371 50.6768 -15.6259 39.2158L40.9643 -17.3311ZM40.0292 -17.5301L39.5408 -18.0186L-17.0387 38.5389L-16.5504 39.0274L40.0292 -17.5301ZM41.0647 36.9275C57.2918 18.7858 56.7172 -9.0658 39.2939 -26.4856L-17.2689 30.0887C-30.0531 17.3071 -30.4684 -3.09666 -18.5626 -16.4072L41.0647 36.9275ZM31.3207 -18.5085C44.9483 -4.88203 44.9459 17.1972 31.3223 30.8212L-25.2472 -25.7464C-42.8624 -8.13053 -42.8648 20.4445 -25.2455 38.0624L31.3207 -18.5085ZM31.3235 30.82C17.6973 44.4479 -4.38342 44.4464 -18.0082 30.821L38.5617 -25.7462C20.9453 -43.3634 -7.6308 -43.3649 -25.2484 -25.7452L31.3235 30.82ZM-18.008 30.8212C-31.6317 17.197 -31.6337 -4.88202 -18.0066 -18.5083L38.5601 38.0621C56.1789 20.4445 56.1769 -8.13039 38.5615 -25.7464L-18.008 30.8212ZM-18.0067 -18.5082C-4.38225 -32.1318 17.6961 -32.1333 31.322 -18.5072L-25.2469 38.061C-7.62964 55.6785 20.9442 55.677 38.5602 38.062L-18.0067 -18.5082Z"
                                fill="#798A96" mask="url(#path-1-inside-1_135_600)" />
                        </svg>
                    </div>
                </div>
                <div class="cart_icon">
                    <a href="{{ url('/keranjang') }}">
                        <img src="{{ asset('assets/img/keranjang.png') }}" alt="" srcset="">
                        <span id="countCart"></span>
                    </a>
                </div>
                @if (Auth::user() && Auth::user()->role == '3')
                    <div id="user_auth">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}
                                @if ($transaksi && count($transaksi) > 0)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('homepage.profil') }}">Profil Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('homepage.tagihan') }}">
                                        Tagihan
                                        @if ($transaksi && count($transaksi) > 0)
                                            <span class="top-5 translate-middle badge rounded-pill bg-danger"
                                                style="font-size: 10px;">{{ count($transaksi) }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('homepage.riwayat') }}">Riwayat
                                        Pesanan</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('homepage.page_logout') }}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div id="sign_in">
                        <a href="{{ route('homepage.page_login') }}" class="tm_button tm_primary">Masuk</a>
                    </div>
                @endif
                <!-- </div> -->
            </div>


        </div>
    </header>

    @yield('konten_page')

    <footer>
        <div class="container">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('assets/img/logo_footer.png') }}" alt="" srcset="">
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <h1>Tautan Terkait</h1>
                    <ul>
                        <li>Tentang</li>
                        <li>Belanja</li>
                        <li>Kontak</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <h1>Kontak Kami</h1>
                    <ul>
                        <li><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.02222 8.65556C5.62222 11.8 8.2 14.3667 11.3444 15.9778L13.7889 13.5333C14.0889 13.2333 14.5333 13.1333 14.9222 13.2667C16.1667 13.6778 17.5111 13.9 18.8889 13.9C19.5 13.9 20 14.4 20 15.0111V18.8889C20 19.5 19.5 20 18.8889 20C8.45556 20 0 11.5444 0 1.11111C0 0.5 0.5 0 1.11111 0H5C5.61111 0 6.11111 0.5 6.11111 1.11111C6.11111 2.5 6.33333 3.83333 6.74444 5.07778C6.86667 5.46667 6.77778 5.9 6.46667 6.21111L4.02222 8.65556Z"
                                    fill="#333333" />
                            </svg>
                            +62 000 0000 0000</li>
                        <li><svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 9.5C6.33696 9.5 5.70107 9.23661 5.23223 8.76777C4.76339 8.29893 4.5 7.66304 4.5 7C4.5 6.33696 4.76339 5.70107 5.23223 5.23223C5.70107 4.76339 6.33696 4.5 7 4.5C7.66304 4.5 8.29893 4.76339 8.76777 5.23223C9.23661 5.70107 9.5 6.33696 9.5 7C9.5 7.3283 9.43534 7.65339 9.3097 7.95671C9.18406 8.26002 8.99991 8.53562 8.76777 8.76777C8.53562 8.99991 8.26002 9.18406 7.95671 9.3097C7.65339 9.43534 7.3283 9.5 7 9.5ZM7 0C5.14348 0 3.36301 0.737498 2.05025 2.05025C0.737498 3.36301 0 5.14348 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 5.14348 13.2625 3.36301 11.9497 2.05025C10.637 0.737498 8.85652 0 7 0Z"
                                    fill="#333333" />
                            </svg>
                            &nbsp; Yasin Limpo Street, Gowa, South Sulawesi, Indonesia</li>
                        <li><svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 4L10 9L2 4V2L10 7L18 2V4ZM18 0H2C0.89 0 0 0.89 0 2V14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H18C18.5304 16 19.0391 15.7893 19.4142 15.4142C19.7893 15.0391 20 14.5304 20 14V2C20 1.46957 19.7893 0.960859 19.4142 0.585786C19.0391 0.210714 18.5304 0 18 0Z"
                                    fill="#333333" />
                            </svg>
                            &nbsp; mail@soupedia.com</li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h1>Ikuti Kami</h1>
                    <div class="d-flex follow-medsos">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.99731 6.66525C8.16111 6.66525 6.66262 8.16376 6.66262 10C6.66262 11.8362 8.16111 13.3348 9.99731 13.3348C11.8335 13.3348 13.332 11.8362 13.332 10C13.332 8.16376 11.8335 6.66525 9.99731 6.66525ZM19.9989 10C19.9989 8.61907 20.0114 7.25064 19.9338 5.87221C19.8563 4.27113 19.4911 2.85017 18.3203 1.67938C17.147 0.506085 15.7286 0.14334 14.1275 0.065788C12.7466 -0.0117644 11.3782 0.000744113 9.99981 0.000744113C8.61891 0.000744113 7.25051 -0.0117644 5.8721 0.065788C4.27105 0.14334 2.85012 0.508587 1.67935 1.67938C0.506076 2.85267 0.143338 4.27113 0.0657868 5.87221C-0.0117642 7.25314 0.000744099 8.62157 0.000744099 10C0.000744099 11.3784 -0.0117642 12.7494 0.0657868 14.1278C0.143338 15.7289 0.508578 17.1498 1.67935 18.3206C2.85262 19.4939 4.27105 19.8567 5.8721 19.9342C7.25301 20.0118 8.62141 19.9993 9.99981 19.9993C11.3807 19.9993 12.7491 20.0118 14.1275 19.9342C15.7286 19.8567 17.1495 19.4914 18.3203 18.3206C19.4936 17.1473 19.8563 15.7289 19.9338 14.1278C20.0139 12.7494 19.9989 11.3809 19.9989 10ZM9.99731 15.131C7.15795 15.131 4.86644 12.8394 4.86644 10C4.86644 7.16058 7.15795 4.86903 9.99731 4.86903C12.8367 4.86903 15.1282 7.16058 15.1282 10C15.1282 12.8394 12.8367 15.131 9.99731 15.131ZM15.3383 5.8572C14.6754 5.8572 14.14 5.32184 14.14 4.65889C14.14 3.99594 14.6754 3.46058 15.3383 3.46058C16.0013 3.46058 16.5366 3.99594 16.5366 4.65889C16.5368 4.81631 16.5059 4.97222 16.4458 5.1177C16.3856 5.26317 16.2974 5.39535 16.1861 5.50666C16.0748 5.61798 15.9426 5.70624 15.7971 5.76639C15.6516 5.82654 15.4957 5.8574 15.3383 5.8572Z"
                                fill="#333333" />
                        </svg>

                        <svg width="9" height="20" viewBox="0 0 9 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.29749 20V10.6154H0V7.23652H2.29749V4.3505C2.29749 2.08264 3.65463 0 6.78176 0C8.04789 0 8.98413 0.1311 8.98413 0.1311L8.91036 3.28642C8.91036 3.28642 7.95554 3.27638 6.9136 3.27638C5.78591 3.27638 5.60524 3.83768 5.60524 4.7693V7.23652H9L8.85229 10.6154H5.60524V20H2.29749Z"
                                fill="#333333" />
                        </svg>

                        <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25 2.37236C24.0806 2.77326 23.093 3.04414 22.0547 3.16658C23.126 2.53575 23.9275 1.5429 24.3097 0.373289C23.3031 0.961624 22.2016 1.37575 21.0528 1.59766C20.2803 0.78596 19.2571 0.247955 18.142 0.0671694C17.027 -0.113617 15.8825 0.0729309 14.8862 0.59785C13.8899 1.12277 13.0976 1.95669 12.6323 2.97014C12.167 3.98359 12.0547 5.11988 12.3128 6.20257C10.2734 6.1018 8.27824 5.58015 6.45691 4.67147C4.63558 3.76279 3.02876 2.48739 1.74073 0.928046C1.30032 1.67567 1.04708 2.54248 1.04708 3.46563C1.04659 4.29667 1.25455 5.11499 1.65251 5.84798C2.05048 6.58096 2.62614 7.20594 3.32842 7.66748C2.51396 7.64198 1.71747 7.42541 1.00524 7.03579V7.1008C1.00516 8.26638 1.41486 9.39609 2.16483 10.2982C2.91479 11.2004 3.95883 11.8194 5.11979 12.0503C4.36425 12.2515 3.57211 12.2811 2.80322 12.137C3.13078 13.1399 3.76882 14.0169 4.62804 14.6452C5.48725 15.2735 6.52462 15.6217 7.59491 15.641C5.77803 17.0446 3.53418 17.806 1.22435 17.8026C0.815182 17.8027 0.406364 17.7792 0 17.7322C2.34462 19.2157 5.07392 20.003 7.86136 20C17.2972 20 22.4555 12.3092 22.4555 5.63915C22.4555 5.42245 22.45 5.20358 22.4401 4.98687C23.4435 4.27281 24.3096 3.38858 24.9978 2.37562L25 2.37236Z"
                                fill="#333333" />
                        </svg>



                    </div>
                </div>
            </div>

            <hr>

            <p>Copyright ?? 2021 Tomoni Walet. All rights reserved.</p>

        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendors/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/toastr/toastr.min.js') }}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendors/lightbox/src/js/lightbox.js') }}"></script>
    <script src="{{ asset('js/page.js') }}"></script>
    @stack('page_script')
    <script>
        $(function() {
            lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'fitImagesInViewport' : true
            })
            let loadData = new homepage();
            @if (Auth::user())
                loadData.get_count_cart("{{ Auth::user()->id }}");
            @endif
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
