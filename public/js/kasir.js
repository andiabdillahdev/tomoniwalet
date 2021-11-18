let host = $('meta[name="host_url"]').attr("content");
let myArray = [];
let total = 0;
$('#produk_kasir_get').on('change',function () {
    
    $.ajax({
        type: "GET",
        url: host+'/staff/kasir/getByIDProduk/'+$(this).val(),
        success: function (res) {
            console.log(res);
            let html = '';
            
            // $('#list_checkout').html('');
            $('#tb_kasir').DataTable().row.add([
                res.id,
                res.kode,
                res.nama,
                `<input type="number" class="form-control form-control-sm" value="1" data-val="${res.id}">`,
                res.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"),
                `<i class="mdi mdi-delete delete" data-val="${res.id}" style="font-size:22px;color:#ff1414;cursor:pointer;"></i>`
            ]).draw();

            myArray[res.id] = res.harga;
            
            html += `<div class="d-flex justify-content-between item${res.id}">
            <p class="text-dark">${res.nama}</p>
             <small class="font-weight-medium">${res.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</small>
         </div>`;
         $('#list_checkout').append(html);

         calculate(myArray);
        }
    });

})

$('#tb_kasir tbody').on("click", 'td .delete', function () {
    $('#tb_kasir').DataTable().row($(this).parents('tr')).remove().draw(false);
    let index = $(this).attr('data-val');
    console.log(index);
    $(`.item${index}`).remove();
    myArray.splice(index, 1);
    calculate(myArray);
});

$('#tb_kasir tbody').on("keyup", 'td input', function () {
    // $('#tb_kasir').DataTable().row($(this).parents('tr')).remove().draw(false);
    let value = $(this).val();
    console.log(value);
});

$('#tb_kasir tbody').on("change", 'td input', function () {
    // $('#tb_kasir').DataTable().row($(this).parents('tr')).remove().draw(false);
    let value = $(this).val();
    let index = $(this).attr('data-val');
    let price = myArray[index];
    
    myArray[index] = parseInt(value) * price;
    calculate(myArray);
});

calculate = (val) =>{
    
    if (val) {
        total = val.reduce(function (accumulator,current) {
            return accumulator + current;
        })
    }else{
        total = 0;
    }
    
    $('#total span').html('Rp. '+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
    $('#total_').val(total);
}

$('#saveKasir').on('click',function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    let detail = $('#tb_kasir').DataTable().rows().data().toArray();
    console.log(detail);
    for (let index = 0; index < detail.length; index++) {
        detail[index][3] =  $('#tb_kasir').DataTable().cell(index, 3).nodes().to$().find('input').val();
    }

    $.ajax({
        type: "POST",
        timeout: 50000,
        url: host + "/staff/kasir/store",
        data: {
            'header' :$('#form_detail_kasir').serializeArray(),
            'detail' : detail
        },
        success: function(res) {
            console.log(res);
            // if (res.status_code == 200) {
            //     notif("success", res.message);
            //     setTimeout(function () {
            //         window.location.href = host + "/" + redirect;
            //     }, 1500);
            // } 

            
        },
        error: function (xhr) {
            $.each(xhr.responseJSON["errors"],function (key, value) {
                    console.log(key);
                    $(`#${key}`).html(value);
                }
            );
        },
    });
})

$('#nominal_cash input').on('keyup', function () {
    let value = $(this).val().replace(/,/g, '');
    let kembalian = 0;
    kembalian = value - total;
    // console.log(value.replace(/\B(?=(\d{3})+(?!\d))/g, ","))
    // console.log(kembalian);
    $('#nominal_kembalian input').val(kembalian.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
})