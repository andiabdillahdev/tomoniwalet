@extends('homepage.layouts.headfoot')
@section('konten_page')

    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->
        <section class="section-list-tagihan">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="card-tml">
                            <span>Note: Silahkan melakukan pembayaran dengan melakukan transfer ke rekening berikut ini
                                sesuai
                                dengan harga pesanan anda.</span><br>
                            <b>Nomor Rekening: 00557565637375858</b><br>
                            <b>Atas Nama: Rahmat Ilyas</b><br>
                            <b>Bank Tujuan: BRI</b><br>
                            <p>Kode Pesanan : TML-343-23</p>
                            <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
                            <button type="button" class="btn button-sm button-primary mt-3">Kirim</button>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
@push('page_script')
    <script>
        $(function() {
            function previewImage() {
                document.getElementById("image-preview").style.display = "block";
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById("image-preview").src = oFREvent.target.result;
                };
            };
        });
    </script>
@endpush
