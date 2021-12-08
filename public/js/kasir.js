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
                `<div class="d-flex">
                <button class="number_inc" data-ref="plus"><i class="mdi mdi-plus"></i></button><input type="number" class="form-control size-custom-input" value="1" data-val="${res.id}" readonly><button class="number_inc" data-ref="minus"><i class="mdi mdi-minus"></i></button>
                </div>`,
                res.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"),
                `<i class="mdi mdi-delete delete" data-val="${res.id}" style="font-size:22px;color:#ff1414;cursor:pointer;"></i>`
            ]).draw();
            

            let status = '';
            $.each(myArray, function (indexInArray, valueOfElement) { 
                console.log(indexInArray);
                if (res.id == indexInArray) {
                    alert('produk sudah ada');
                    status = true;
                }else{
                    status = false;
                }
            });

            if (status != false) {
                alert('ada');
            } else {
                myArray[res.id] = {
                    'kuantitas' : 1,
                    'harga' : res.harga
                };
            }

            
            
            html += `<div class="d-flex justify-content-between item${res.id}">
            <p class="text-dark">${res.nama}</p>
             <small class="font-weight-medium">Rp. ${res.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}</small>
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

$('#tb_kasir tbody').on("click", 'td .number_inc', function () {
    let inc = $(this).attr('data-ref');
    let value_input = $(this).parent().find('input').val();
    let uniq = $(this).parent().find('input').attr('data-val');
    let result = 0;
    if (inc == "plus") {
        result = parseInt(value_input) + 1;
        $(this).parent().find('input').val(result);
        
    }else{
        result = parseInt(value_input) - 1;
        $(this).parent().find('input').val(result);
    }

    myArray[uniq]['kuantitas'] = result;

    // let value = $(this).val();
    // let index = $(this).attr('data-val');
    // let price = myArray[index];
    
    // myArray[index] = parseInt(value) * price;
    calculate(myArray);
});

calculate = (val) =>{
    console.log(val);
    total = 0;
    let sub_total = 0;
    if (val) {
        $.each(val, function (indexInArray, valueOfElement) { 
            if (valueOfElement != undefined) {
                sub_total = valueOfElement['kuantitas'] * valueOfElement['harga'];
                $(`.item${indexInArray} small`).html(sub_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
                total += sub_total;   
            }
              
        });
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
    console.log(total);
    let value = $(this).val().replace(/,/g, '');
    let kembalian = 0;

    kembalian = value - total;
    // console.log(value.replace(/\B(?=(\d{3})+(?!\d))/g, ","))
    // console.log(kembalian);
    $('#nominal_kembalian input').val(kembalian.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
})