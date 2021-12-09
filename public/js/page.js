let host = $('meta[name="host_url"]').attr("content");
post_auth = (form,url,redirect) =>{
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    
    $.ajax({
        type: "POST",
        timeout: 50000,
        url: host + "/" + url,
        data: $(`#${form}`).serialize(),
        success: function(res) {
            console.log(res)
            if (res.status_code == 200) {
               notif("success", res.message);
               setTimeout(function () {
                window.location.href = host + "/" + redirect;
            }, 1500);
           } 

       },
       error: function(xhr) {
                // console.log(xhr.responseJSON["errors"])
                $('.error-notif').html('');
                $.each(xhr.responseJSON["errors"],function (key, value) {
                    console.log(key);
                    $(`#${key}`).html(value);
                }
                );
            }
        });

}

notif = (type, message) => {
    Command: toastr[`${type}`](`${message}`);
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
};

function homepage(){

    // Hero Section
    this.hero_section = function () {
        $.ajax({
            type: "GET",
            url: host + "/source/hero-section",
            success: function(response) {
                console.log(response);
                if (response.hero_section['length'] > 0) {
                    $('#hero-section h1').html(response.hero_section[0]['title_gambar_hero']);
                    $('#hero-section p').html(response.hero_section[0]['text_hero']);
                    $('#img-banner-hero').attr("src", `${host}/uploads/page/hero_section/${response.hero_section[0]['gambar_hero']}`);
                }

            },
            error: function() {
                notif("warning", 'Gagal');
            }
        });
    }
    // End Hero Section
    // Produk Terlaris
    this.produk_terlaris = function () {
        let html = '';
        $.ajax({
            type: "GET",
            url: host + "/source/get-produk-terbaru",
            success: function(response) {
                console.log(response['data']);
                
                if (response['data']['length'] > 0) {
                    $.each(response['data'], function (indexInArray, valueOfElement) { 
                        html+= `<div class="col-lg-3">
                        <div class="card-tml content-card">
                        <img src="${host}/uploads/produk/${valueOfElement.gambar_detail[0]['gambar']}" alt="" srcset="">
                        <div class="d-flex justify-content-center">
                        <span>${valueOfElement.kategori['nama']}</span>
                        </div>
                        <h1>${valueOfElement.nama}</h1>
                        <p>Rp ${valueOfElement.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</p>
                        <div class="d-flex justify-content-center">
                        <button class="btn button-sm button-primary">Lihat</button>
                        </div>
                        </div>
                        </div>`;
                    });
                    
                    $('#produk_terbaru').append(html);
                }

            },
            error: function() {
                notif("warning", 'Gagal');
            }
        });
    }
    // End Produk Terlaris

    // Testimonial
    this.testimonial = function () {
        let html = '';
        $.ajax({
            type: "GET",
            url: host + "/source/get-testimonial",
            success: function(response) {
                console.log(response);

                $.each(response, function (indexInArray, valueOfElement) { 
                    html += ` <div class="testimonial-content text-center">
                    <div class="d-flex justify-content-center">
                    <img src="${host}/uploads/testimonial/${valueOfElement.image}" alt="" srcset="">
                    </div>

                    <h1>${valueOfElement.nama}</h1>
                    <span>Juragan Walet Makassar</span>
                    <div class="d-flex justify-content-center">
                    <div class="hr_line"></div>
                    </div>
                    <p>“ ${valueOfElement.text} “</p>
                    </div>`;
                });

                // $('.owl-carousel').html(html);

                // if (response.hero_section['length'] > 0) {
                //     $('#hero-section h1').html(response.hero_section[0]['title_gambar_hero']);
                //     $('#hero-section p').html(response.hero_section[0]['text_hero']);
                //       $('#img-banner-hero').attr("src", `${host}/uploads/page/hero_section/${response.hero_section[0]['gambar_hero']}`);
                // }

            },
            error: function() {
                notif("warning", 'Gagal');
            }
        });

        
    }
    // End Testimoni

    // Belnja
    this.belanja = function () {
        let html = '';
        $.ajax({
            type: "GET",
            url: host + "/source/get-belanja",
            success: function(response) {
                console.log(response);
                $.each(response, function (key, val) {
                    html += `
                    <div class="col-lg-3 mb-3">
                    <div class="card-tml content-card">
                    <img src="${host}/uploads/produk/${val.foto}" alt="" srcset="" height="200" width="220">
                    <div class="d-flex justify-content-center">
                    <span>${val.nama_kategori}</span>
                    </div>
                    <h1>${val.nama}</h1>
                    <p>${val.harga}</p>
                    <div class="d-flex justify-content-center">
                    <button class="btn button-sm button-primary add-cart" produk-id="${val.id}">Tambah ke Cart</button>
                    </div>
                    </div>
                    </div>
                    `;
                });

                $('#contentBelanja').html(html);

            },
            error: function() {
                notif("warning", 'Gagal');
            }
        });
    }

    // Belnja
    this.get_kategori = function () {
        let html = '';
        $.ajax({
            type: "GET",
            url: host + "/source/get-kategori",
            success: function(response) {
                $('.kategoriContent').html(response);
            }
        });
    }

    // Add Cart 
    this.add_cart = function(user_id, produk_id, kuantitas) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        $.ajax({
            type: "POST",
            url: host + "/store-cart",
            data: {
                user_id: user_id,
                produk_id: produk_id,
                kuantitas: kuantitas,
                status: 'invalid'
            },
            success: function(res) {
                notif("success", res.message);

            },
            error: function(xhr) {
                $('.error-notif').html('');
                $.each(xhr.responseJSON["errors"],function (key, value) {
                    console.log(key);
                    $(`#${key}`).html(value);
                }
                );
            }
        });
    }
}

// notif = (type, message) => {
//     Command: toastr[`${type}`](`${message}`);
//     toastr.options = {
//         closeButton: false,
//         debug: false,
//         newestOnTop: false,
//         progressBar: false,
//         positionClass: "toast-top-right",
//         preventDuplicates: false,
//         onclick: null,
//         showDuration: "300",
//         hideDuration: "1000",
//         timeOut: "5000",
//         extendedTimeOut: "1000",
//         showEasing: "swing",
//         hideEasing: "linear",
//         showMethod: "fadeIn",
//         hideMethod: "fadeOut"
//     };
// };