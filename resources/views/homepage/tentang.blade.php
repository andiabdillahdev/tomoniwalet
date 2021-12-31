@extends('homepage.layouts.headfoot')
@section('konten_page')
    @php
    $testi = new App\testimonial();
    @endphp
    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->

        <section class="section-list-other">

            <div id="tentang">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1>TONOMI WALET</h1>
                            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since the 1500s, when an unknown printer </p>

                            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since the 1500s, when an unknown printer </p>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section id="testimoni" class="section-first">
            <div class="header_content text-center">
                <h1>Testimonial</h1>
                <h3>Lihat apa yang mereka katakan tentang kami</h3>
            </div>
            <div class="container owl-carousel">
                @foreach ($testi->all() as $tst)
                    <div class="testimonial-content text-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('uploads/testimonial/' . $tst->image) }}" alt="" srcset="">
                        </div>

                        <h1>{{ $tst->nama }}</h1>
                        {{-- <span>Juragan Walet Makassar</span> --}}
                        <div class="d-flex justify-content-center">
                            <div class="hr_line"></div>
                        </div>
                        <p>“{{ $tst->text }} “</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
@push('page_script')
    <script>
        $(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1800,
                autoplayHoverPause: true
            });
        })
    </script>
@endpush
