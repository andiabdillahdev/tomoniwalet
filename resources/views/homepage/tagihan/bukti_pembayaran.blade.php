@extends('homepage.layouts.headfoot')
@section('konten_page')
    @php
    if (!Auth::user() || !$kode) {
        header('Location: ' . url('/'));
        exit();
    }
    @endphp

    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->
        <section class="section-list-tagihan">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="card-tml">
                            <p>Note: Silahkan melakukan pembayaran dengan melakukan transfer ke rekening berikut ini
                                sesuai dengan harga pesanan anda.</p>
                            <b>Kode Pesanan : TML-343-23</b><br>
                            <b>Nomor Rekening: 00557565637375858</b><br>
                            <b>Atas Nama: Rahmat Ilyas</b><br>
                            <b>Bank Tujuan: BRI</b><br>
                            <b>Nominal: Rp{{ number_format($total_harga) }}</b><br><br <p>Setelah melakukan transfer,
                            harap mengupload bukti
                            pembayaran pada form berikut</p>

                            <form method="POST" action="{{ url('/upload-foto-bayar') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="text-center">
                                    <div class="mb-2" id="img-privew"
                                        style="border: dashed 2px; width: 350px; height:300px;">
                                        <br>
                                        <h4 class="mt-5 pt-5"><i>Upload foto pembayaran</i></h4>
                                    </div>
                                </div>
                                <label class="btn btn-primary" for="foto_pembayaran"><i class="fa fa-upload"></i> Upload
                                    Foto</label> <br>
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="kode" value="{{ $kode }}">
                                <input type="file" name="foto_pembayaran" style="display: none;" id="foto_pembayaran">
                                <button type="submit" class="btn button-sm button-primary mt-3">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
@push('page_script')
    <script>
        $(function() {
            $('#foto_pembayaran').change(function(e) {
                var foto_pembayaran = $(this).prop('files')[0];
                var check = 0;

                var ext = ['image/jpeg', 'image/png', 'image/bmp'];

                $.each(ext, function(key, val) {
                    if (foto_pembayaran.type == val) check = check + 1;
                });

                if (check == 1) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img-privew').html('<img src="' + e.target.result +
                            '" style="height: 100%; width: 100%;">');
                    }
                    reader.readAsDataURL(this.files[0]);
                } else {
                    alert('Format file tidak dibolehkan, pilih file lain');
                    $(this).val('');
                    return;
                }
            });

            @if (session('success'))
                Swal.fire({
                icon: 'success',
                title: 'Upload Berhasil',
                allowOutsideClick: false,
                text: 'Pesanan anda sedang diproses silahkan tunggu informasi selanjutnya melalui WhatsApp!',
                confirmButtonText: 'Transaksi Sekarang',
                }).then(function () {
                location.href = "{{ url('') }}";
                });
            @endif
        });
    </script>
@endpush
