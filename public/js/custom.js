$(function(){
    let host = $('meta[name="host_url"]').attr("content");
    overlayForm = (url, title,other) => {
     console.log(other);
        $.ajax({
            url: host + "/" + url,
            dataType: "html",
            success: function(response) {
                if (other != undefined) {
                    $("#modalTabelTitle").html(title);
                    $("#modal-body-table").html(response);
                    $("#exampleModalTable").modal('show');
                    dataTableDetailModal('owner/produk/getall','tb_detail_persediaan','produk');
              
                } else {
                    $("#exampleModalLabel").html(title);
                    $("#modal-body").html(response);
                    $("#exampleModal").modal('show');
                }
                    
            },
            error: function() {
                notif("warning", 'Gagal');
            }
        });

    };

    overlayTransaksiVendor = (elementsupplier,url,title,mode) =>{
        console.log(url);
        if (mode != 'barang_keluar') {
            let supplier = $(`#${elementsupplier}`).val();
            if(supplier !== ''){
                $.ajax({
                    url: host + "/" + url,
                    dataType: "html",
                    success: function(response) {
                    
                        $("#modalTabelTitle").html(title);
                        $("#modal-body-table").html(response);
                        $("#exampleModalTable").modal('show');
                        dataTableDetailModal(`owner/pesanan-pembelian/getAll/bySupplier/${supplier}`,'tb_detail_persanan_barang','pesanan_pembelian');
                            
                    },
                    error: function() {
                        notif("warning", 'Gagal');
                    }
                });
            }else{
                notif("warning", 'Supplier / Pemasok Belum di pilih');
            }
        }else{
            $.ajax({
                url: host + "/" + url,
                dataType: "html",
                success: function(response) {
                
                    $("#modalTabelTitle").html(title);
                    $("#modal-body-table").html(response);
                    $("#exampleModalTable").modal('show');
                    dataTableDetailModal(`owner/pengiriman-pesanan/belum-selesai`,'tb_detail_persanan_barang','pengiriman_pesanan');
                        
                },
                error: function() {
                    notif("warning", 'Gagal');
                }
            });
        }

    }

    store = (url,table,form) =>{
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        $.ajax({
            type: "POST",
            timeout: 50000,
            url: host + "/" + url,
            data: new FormData($(`#${form}`)[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {

                if (res.status_code == 200) {
                     notif("success", res.message);
                     $(`#${table}`).DataTable().ajax.reload();
                     $('#exampleModal').modal('hide');
                } 
               
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

    store_page = (form,url,redirect) =>{
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "POST",
            timeout: 50000,
            url: host + "/" + url,
            data: new FormData($(`#${form}`)[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {

                if (res.status_code == 200) {
                    notif("success", res.message);
                    setTimeout(function () {
                        window.location.href = host + "/" + redirect;
                    }, 1500);
               } 

                
            },
            error: function (xhr) {
                $.each(xhr.responseJSON["errors"],function (key, value) {
                        console.log(key);
                        $(`#${key}`).html(value);
                    }
                );
            },
        });
    
    }

    store_with_table = (form,url,redirect) =>{
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

       let detail = $('#tb_general_persediaan').DataTable().rows().data().toArray();

        for (let index = 0; index < detail.length; index++) {
            detail[index][2] =  $('#tb_general_persediaan').DataTable().cell(index, 2).nodes().to$().find('input').val();
            detail[index][3] =  $('#tb_general_persediaan').DataTable().cell(index, 3).nodes().to$().find('input').val();
            detail[index][4] =  $('#tb_general_persediaan').DataTable().cell(index, 4).nodes().to$().find('input').val();
            detail[index][5] =  $('#tb_general_persediaan').DataTable().cell(index, 5).nodes().to$().find('input').val();
        }

        console.log(detail)

        $.ajax({
            type: "POST",
            timeout: 50000,
            url: host + "/" + url,
            data: {
                'header' :$(`#${form}`).serializeArray(),
                'detail' : detail
            },
            success: function(res) {

                if (res.status_code == 200) {
                    notif("success", res.message);
                    setTimeout(function () {
                        window.location.href = host + "/" + redirect;
                    }, 1500);
               } 

                
            },
            error: function (xhr) {
                $.each(xhr.responseJSON["errors"],function (key, value) {
                        console.log(key);
                        $(`#${key}`).html(value);
                    }
                );
            },
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

    delete_data = (url, table) => {
        token = $('meta[name="csrf-token"]').attr("content");
        swal({
            title: "Apa Kamu Yakin ?",
            text: "Anda tidak akan dapat memulihkan data ini!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: host + "/" + url,
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: token
                    },
                    success: function(response) {
                        if (response.status_code == 200) {
                            $(`#${table}`)
                            .DataTable()
                            .ajax.reload();
                            swal("Berhasil", `${response.message}`, "success");
                        }
                    }
                });
            } else {
                swal("Batal", "Data ini aman :)", "error");
            }
        });
    };

    currency = (input) => {
        $(`.${input}`).priceFormat(
          {
          prefix: '',
          centsLimit:0,
          allowNegative: true
        });
    }

   

});