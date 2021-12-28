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
                                <h4 class="text-center">Profil Saya</h4>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-sm-8">
                                        <div id="detail-profil">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="180">Nama Lengkap</td>
                                                        <td width="10">:</td>
                                                        <td>{{ Auth::user()->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td>{{ Auth::user()->email }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary" id="btn-edit-profil"><i
                                                    class="fa fa-edit"></i> Edit Profil</button>
                                        </div>
                                        <div id="edit-profil" hidden="">
                                            <form>
                                                @csrf
                                                <div class="form-group row mb-3">
                                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                                        <input type="text" name="name" class="form-control" required=""
                                                            autocomplete="off" placeholder="Nama Lengkap.."
                                                            value="{{ old('name') ? old('name') : Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" class="form-control" required=""
                                                            autocomplete="off" placeholder="Email.."
                                                            value="{{ old('email') ? old('email') : Auth::user()->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="password" class="form-control"
                                                            placeholder="Password.." autocomplete="off">
                                                        <span class="text-info">Note: Silahkan masukkan password baru
                                                            untuk
                                                            mengganti password lama</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-primary">Update Data</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            id="batal-edit-profil">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
            $('#dataTable').DataTable({
                responsive: true,
                scrllX: true,
                scrllY: true,
            });

            let host = $('meta[name="host_url"]').attr("content");

            $('#btn-edit-profil').click(function(event) {
                $('#edit-profil').removeAttr('hidden');
                $('#detail-profil').attr('hidden', '');
            });
            $('#batal-edit-profil').click(function(event) {
                $('#edit-profil').attr('hidden', '');
                $('#detail-profil').removeAttr('hidden');
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

            $('form').submit(function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                let loadData = new homepage();
                loadData.profil(data);
            });
        })
    </script>
@endpush
