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
                        <div class="row input-group-detail-produk">
                            <span class="input-number-decrement">–</span>
                            <input class="input-number" type="text" value="1" min="0" max="10">
                            <span class="input-number-increment">+</span>
                        </div>
                      
                        <button type="button" class="tm_button_large tm_primary btn-position-custom"> <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.67 10.4794L15.9831 3.68955C16.0779 3.19931 15.7609 2.73248 15.3331 2.73248H4.42245L4.16783 1.26974C4.10439 0.905143 3.83139 0.643311 3.5147 0.643311H0.666667C0.298472 0.643311 0 0.994063 0 1.42675V1.94904C0 2.38173 0.298472 2.73248 0.666667 2.73248H2.60786L4.5592 13.9433C4.09236 14.2588 3.77778 14.8504 3.77778 15.5287C3.77778 16.5383 4.47422 17.3567 5.33333 17.3567C6.19245 17.3567 6.88889 16.5383 6.88889 15.5287C6.88889 15.017 6.70981 14.5548 6.42156 14.2229H12.2451C11.9569 14.5548 11.7778 15.017 11.7778 15.5287C11.7778 16.5383 12.4742 17.3567 13.3333 17.3567C14.1924 17.3567 14.8889 16.5383 14.8889 15.5287C14.8889 14.8049 14.5309 14.1794 14.0117 13.8833L14.1649 13.0908C14.2598 12.6006 13.9427 12.1338 13.5149 12.1338H6.05881L5.877 11.0892H14.0199C14.3312 11.0892 14.601 10.8361 14.67 10.4794Z" fill="white"/>
</svg>
Tambahkan Ke Cart</button>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @endsection

    @push('page_script')
<script>
        (function() {
 
 window.inputNumber = function(el) {

   var min = el.attr('min') || false;
   var max = el.attr('max') || false;

   var els = {};

   els.dec = el.prev();
   els.inc = el.next();

   el.each(function() {
     init($(this));
   });

   function init(el) {

     els.dec.on('click', decrement);
     els.inc.on('click', increment);

     function decrement() {
       var value = el[0].value;
       value--;
       if(!min || value >= min) {
         el[0].value = value;
       }
     }

     function increment() {
       var value = el[0].value;
       value++;
       if(!max || value <= max) {
         el[0].value = value++;
       }
     }
   }
 }
})();

inputNumber($('.input-number'));

</script>
@endpush

 