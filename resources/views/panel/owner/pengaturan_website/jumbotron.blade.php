@extends('layouts.layouts')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <!-- <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }} </h3> -->
                    <h6 class="font-weight-normal mb-0">Pengaturan Jumbotron</h6>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hero Section</h4>

                 <div class="container">
                 <form id="form-hero-section" class="forms-sample">
                    <div class="form-group">
                      <label for="gambar_hero_">Gambar Hero</label>
                      <div class="preview-image">
                            <img src="{{ asset('uploads/page/hero_section/'.$hero[0]['gambar_hero']) }}" alt="" srcset="">
                      </div>
                      <input type="file" class="form-control form-control-sm" name="gambar_hero" id="gambar_hero_" placeholder="Username">
                      <small class="text-danger error-notif" id="gambar_hero"></small>
                    </div>
                    <div class="form-group">
                      <label for="judul_gambar_">Judul Gambar</label>
                      <input type="text" value="{{$hero[0]['title_gambar_hero']}}" class="form-control form-control-sm" name="title_gambar_hero" id="judul_gambar_" placeholder="Judul Gambar">
                      <small class="text-danger error-notif" id="title_gambar_hero"></small>
                    </div>
                    <div class="form-group">
                      <label for="text_hero_">Text Hero</label>
                      <textarea name="text_hero" style="width:100%" id="text_hero_" class="form-control form-control-sm" rows="2">
                         {{$hero[0]['text_hero']}}
                      </textarea>
                      <small class="text-danger error-notif" id="text_hero"></small>
                    </div>
                    <button type="button" onclick="store_page('form-hero-section','owner/pengaturan-website/jumbotronStore/{{$hero[0]['id']}}','owner/pengaturan-website/jumbotron')" class="btn btn-primary mr-2">Submit</button>
                  </form>
                 </div>
                        

                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Konten Kategori</h4>

                    <form id="form-hero-kategori-section" class="forms-sample">

                        @foreach($kategori_hero as $key => $value)
                        <div class="form-group">
                            <label for="gambar_kategori_">Gambar Kategori {{$key+1}} </label>
                            <input type="file" class="form-control form-control-sm" name="gambar_kategori[]" id="gambar_kategori_">
                            <small class="text-danger error-notif" id="gambar_kategori"></small>
                        </div>

                        <input type="hidden" name="id[]" value="{{$value['id']}}">

                        <div class="form-group">
                            <label for="gambar_kategori_">Pilih Kategori {{$key+1}} </label>
                            {{ Form::select('kategori_id[]',$kategori,$value->id_kategori, ['title' => 'Pilih Kategori Produk','class' => 'form-control form-control-sm selectpicker', 'data-size' => '7', 'data-live-search' => 'true', 'data-toggle'=>'ajax', 'id' => 'kategori_']) }}
                        </div>
                        <hr>
                        @endforeach

                       
                        <button type="button" onclick="store_page('form-hero-kategori-section','owner/pengaturan-website/hero-kategori','owner/pengaturan-website/jumbotron')" class="btn btn-primary mr-2">Submit</button>
                       
                      
                    </form>   

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('.selectpicker').selectpicker();
            currency('currency_format');
        })
    </script>
 @endpush


