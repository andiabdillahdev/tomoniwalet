@extends('homepage.layouts.headfoot')
@section('konten_page')
    @php
    $user_id = Auth::user() ? Auth::user()->id : null;
    $transaksi = new App\transaksi();
    $transaksi = $transaksi->where('user_id', $user_id)->get();
    @endphp
    <div class="wrapper-content">
        <!-- PRODUK TERLARIS -->

        <section class="section-list-other">

            <div id="tentang">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-tml">
                                <h4 class="text-center">Riwayat Pesanan</h4>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width: 100%" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Kode Pesanan</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $dta)
                                                @php
                                                    if ($dta->status == 'baru') {
                                                        $color = 'info';
                                                    } elseif ($dta->status == 'upload') {
                                                        $color = 'warning';
                                                    } elseif ($dta->status == 'selesai') {
                                                        $color = 'success';
                                                    } elseif ($dta->status == 'batal') {
                                                        $color = 'danger';
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $dta->kode }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($dta->tanggal)) }}</td>
                                                    <td>
                                                        <span
                                                            class="badge text-{{ $color }}">{{ strtoupper($dta->status) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-info btn-detail" data-toggle="modal"
                                                            data-target=".modal-detail" data-id="{{ $dta->id }}">
                                                            <i class="fa fa-list"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <div class="modal modal-detail" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                </div>
                <div class="modal-body pt-2 px-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <b>Kode Pesanan: </b>
                                <span class="dtl dtl-kode"></span>
                            </div>
                            <div class="mb-2">
                                <b>Tanggal: </b>
                                <span class="dtl dtl-tanggal"></span>
                            </div>
                            <div class="mb-2">
                                <b>Nama: </b>
                                <span class="dtl dtl-nama"></span>
                            </div>
                            <div class="mb-2">
                                <b>Alamat: </b>
                                <span class="dtl dtl-alamat"></span>
                            </div>
                            <div class="mb-2">
                                <b>Telepon: </b>
                                <span class="dtl dtl-telepon"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <b>Jasa Kirim: </b>
                                <span class="dtl dtl-jasa_kirim"></span>
                            </div>
                            <div class="mb-2">
                                <b>Ongkos Kirim: </b>
                                <span class="dtl dtl-biaya_ongkir"></span>
                            </div>
                            <div class="mb-2">
                                <b>Provinsi Tujuan: </b>
                                <span class="dtl dtl-provinsi"></span>
                            </div>
                            <div class="mb-2">
                                <b>Kota Tujuan: </b>
                                <span class="dtl dtl-kota"></span>
                            </div>
                            <div class="mb-2">
                                <b>Total Harga: </b>
                                <span class="dtl dtl-total_harga"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-center"><u>Item Pesanan</u></h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                                <th>Berat</th>
                            </tr>
                        </thead>
                        <tbody id="tabelItem">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" style="margin-top: -20px;">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('page_script')
    <script>
        $(function() {
            $('#dataTable').DataTable({
                responsive: true,
                scrllX: true,
                scrllY: true,
            });

            let host = $('meta[name="host_url"]').attr("content");

            $(document).on('click', '.btn-detail', function(e) {
                e.preventDefault();

                $('.modal').modal('show');

                $('.dtl').text('-');
                let data_id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ url('/') }}/get-detail-pesanan",
                    method: "GET",
                    data: {
                        id: data_id
                    },
                    success: function(data) {
                        $.each(data, function(key, val) {
                            $('.dtl-' + key).text(val);
                        });

                        var item;
                        $.each(data.item_barang, function(i, itm) {
                            item += `
                            <tr>
                                <td>` + itm.kode_barang + `</td>
                                <td>` + itm.nama_barang + `</td>
                                <td>` + itm.kuantitas + `</td>
                                <td>` + itm.harga + `</td>
                                <td>` + itm.total + `</td>
                                <td>` + itm.berat + `</td>
                            </tr>`;
                        });
                        $('#tabelItem').html(item);
                    }
                });
            });


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
