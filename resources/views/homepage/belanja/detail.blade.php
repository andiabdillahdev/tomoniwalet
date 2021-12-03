@extends('homepage.layouts.headfoot')
@section('konten_page')
    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->

        <section class="section-list-other">
            <div class="container">
                <div id="detail_produk" class="row">
                    <div class="col-lg-4">
                        <div class="box-img">
                           <img src="{{ asset('assets/img/produk.png') }}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h1>Nama Produk</h1>
                        <p>Nullam dolor a pretium cras elementum leo id mauris. Mauris iaculis id praesent viverra. A senectus suscipit justo sed etiam lobortis. Mi tincidunt morbi et ridiculus at enim. Sem porta velit risus urna ultricies non. Id tristique at tortor proin tincidunt tortor non.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @endsection
 