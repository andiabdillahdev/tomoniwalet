@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h6 class="font-weight-normal mb-0">Ini Adalah Panel Administrator <span
                            class="text-primary">Tomoniwalet.com</span></h6>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Produk</h4>

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-8">
                            <form id="form_produk" class="forms-sample">
                            <div class="form-group">
                                    <label for="kategori_">Kategori Produk</label>
                                    <!-- <select class="form-control selectpicker" name="" id="">
                                        <option value="dsfsdf">fsdf</option>
                                        <option value="dsfsdf">fsdf</option>
                                        <option value="dsfsdf">fsdf</option>
                                    </select> -->
                                    {{ Form::select('kategori_id',$kategori,$data['kategori_id'], ['title' => 'Pilih Kategori Produk','class' => 'form-control selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_']) }}
                                    <small class="text-danger error-notif" id="kategori_id"></small>
                                </div>   
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value="{{$data['nama']}}" placeholder="Nama">
                                    <small class="text-danger error-notif" id="nama"></small>
                                </div>
                                <div class="form-group">
                                    <label for="harga_">Harga</label>
                                    <input type="text" class="form-control currency_format" name="harga" id="harga_" value="{{$data['harga']}}">
                                    <small class="text-danger error-notif" id="harga"></small>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="exampleInputEmail1">Berat</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="berat"
                                                value="{{$data['berat']}}">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" type="button">Gram</button>
                                            </div>
                                        </div>
                                        <small class="text-danger error-notif" id="berat"></small>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="exampleInputEmail1">Garansi</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Recipient's username" value="{{$data['garansi']}}" name="garansi" aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-secondary" type="button">Bulan</button>
                                            </div>
                                        </div>
                                        <small class="text-danger error-notif" id="garansi"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="deskripsi_">Deskripsi</label>
                                            <textarea name="deskripsi" id="deskripsi_" class="form-control"
                                                rows="5">
                                                {{$data['deskripsi']}}
                                            </textarea>
                                            <small class="text-danger error-notif" id="deskripsi"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                          
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="status" @if($data['status'] == 'Aktif')
                                                            checked @endif value="Aktif">
                                                        Aktif
                                                        <i class="input-helper"></i></label>
                                                </div>

                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" @if($data['status'] == 'Tidak Aktif')
                                                            checked @endif class="form-check-input"
                                                            name="status" value="Tidak Aktif">
                                                        Tidak Aktif
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            
                                            <small class="text-danger error-notif" id="status"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gambar</label>
                                    <div class="input-images-2"></div>
                                    <small class="text-danger error-notif" id="nama"></small>
                                </div>

                                <button type="button" class="btn btn-primary mr-2"
                                    onclick="store_page('form_produk','owner/produk/update/{{$data->id}}','owner/produk')">Submit</button>
                                <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script>
        $(function () {
            // $('.input-images').imageUploader();
            let data = {!! json_encode($data['gambar_detail']) !!}
            let preloaded = [];
            let host = $('meta[name="host_url"]').attr("content");
            console.log(data);

            $.each(data, function (indexInArray, valueOfElement) { 
                preloaded.push({
                    id : indexInArray+1, src : host+'/uploads/produk/'+valueOfElement.gambar
                })
                // preloaded = [
                //     {id : indexInArray+1, src : host+'/uploads/produk/'+valueOfElement.gambar}
                // ]
            });

            console.log(preloaded);

            // let preloaded = [
            // {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            // {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            // {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            // {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            // {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            // {id: 6, src: 'https://picsum.photos/500/500?random=6'},
            // ];

            $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
            });
            $('.selectpicker').selectpicker();
            currency('currency_format');

        })
    </script>
 @endpush
