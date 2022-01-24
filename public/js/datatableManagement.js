$(function () {
    let host = $('meta[name="host_url"]').attr("content");
    tb_kategori = $("#tb_kategori").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/kategori/getall",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "nama" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<button class="btn btn-warning mr-2" onclick="overlayForm('owner/kategori/edit/${data.id}','Update Data Supplier')" ><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger mr-2" onclick="delete_data('owner/kategori/destroy/${data.id}','tb_kategori')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_testi = $("#tb_testi").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/pengaturan-website/getAllTestimonial",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "image" },
            { data: "nama" },
            { data: "text" },
            { data: "status" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: 1,
                render: function (data) {
                    return `<img src="${host}/uploads/testimonial/${data}" alt="" srcset="" style="width:100px;height:100px;">`;     
                }
            },  
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<button class="btn btn-warning mr-2" onclick="overlayForm('owner/pengaturan-website/edit-testimoni/${data.id}','Update Data Supplier')" ><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger mr-2" onclick="delete_data('owner/pengaturan-website/delete-testimoni/${data.id}','tb_testi')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_supplier = $("#tb_supplier").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/supplier/getall",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "nama" },
            { data: "telepon" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<button class="btn btn-warning mr-2" onclick="overlayForm('owner/supplier/edit/${data.id}','Update Data Supplier')" ><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger mr-2" onclick="delete_data('owner/supplier/destroy/${data.id}','tb_supplier')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_satuan = $("#tb_satuan").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/satuan/getall",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "nama" },
            { data: "nilai" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<button class="btn btn-warning mr-2" onclick="overlayForm('owner/satuan/edit/${data.id}','Update Data Satuan')" ><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger mr-2" onclick="delete_data('owner/satuan/destroy/${data.id}','tb_satuan')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_produk = $("#tb_produk").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/produk/getall",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "nama" },
            { data: "kategori" },
            { data: "harga" },
            { data: "status" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets : 3,
                render: function (data, type, row) {
                    return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            },
            {
                targets : 4,
                render: function (data, type, row) {
                   
                    if (data != 'Tidak Aktif') {
                        return `<p class="font-weight-bold text-success">Aktif</p>`;
                    } else {
                        return `<p class="font-weight-bold text-danger">Tidak Aktif</p>`;
                    }

                }
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<button class="btn btn-info mr-2" onclick="overlayForm('owner/produk/detail/${data.id}','Detail Produk')" ><i class="fa fa-eye"></i> Detail</button><a role="button"  href="${host}/owner/produk/edit/${data.id}" class="btn btn-warning mr-2" ><i class="fa fa-edit"></i> Edit</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/produk/destroy/${data.id}','tb_produk')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_pesanan_pembelian = $("#tb_pesanan_pembelian").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/pesanan-pembelian/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "tanggal" },
            { data: "supplier" },
            { data : "status" },
            { data: null },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets : 4,
                render: function (data, type, row) {
                    if (data == 'Selesai') {
                        return `<span class="badge bg-success">Selesai</span>`;
                    }else{
                        return `<span class="badge bg-warning">Belum Selesai</span>`;
                    }
                }
            },
            {
                targets : 5,
                render: function (data, type, row) {
                    let total = 0;
                    $.each(data.pesanan_pembelian_detail, function (indexInArray, valueOfElement) { 
                         total += valueOfElement.total;
                    });
                    return total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                }
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a class="btn btn-info mr-2" target="_blank" href="${host}/owner/pesanan-pembelian/purchase_order/${data.id}"><i class="fa fa-eye"></i> Nota</a><a role="button"  href="${host}/owner/pesanan-pembelian/edit/${data.id}" class="btn btn-warning mr-2" ><i class="fa fa-edit"></i> Edit</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/pesanan-pembelian/destroy/${data.id}','tb_pesanan_pembelian')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_retur_pembelian = $("#tb_retur_pembelian").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/retur-pembelian/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "tanggal" },    
            { data: "supplier" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a role="button"  href="${host}/owner/retur-pembelian/edit/${data.id}" class="btn btn-warning mr-2" ><i class="fa fa-edit"></i> Edit</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/retur-pembelian/destroy/${data.id}','tb_retur_pembelian')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_retur_penjualan = $("#tb_retur_penjualan").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/retur-penjualan/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "tanggal" },    
            { data: "pelanggan" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a role="button"  href="${host}/owner/retur-penjualan/edit/${data.id}" class="btn btn-warning mr-2" ><i class="fa fa-edit"></i> Edit</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/retur-penjualan/destroy/${data.id}','tb_retur_penjualan')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });


    tb_pengiriman_pesanan = $("#tb_pengiriman_pesanan").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/pengiriman-pesanan/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "tanggal" },
            { data: "pelanggan" },
            { data : "status" },
            { data: null },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets : 4,
                render: function (data, type, row) {
                    if (data == 'Selesai') {
                        return `<span class="badge bg-success">Selesai</span>`;
                    }else{
                        return `<span class="badge bg-warning">Belum Selesai</span>`;
                    }
                }
            },
            {
                targets : 5,
                render: function (data, type, row) {
                    let total = 0;
                    $.each(data.pengiriman_pesanan_detail, function (indexInArray, valueOfElement) { 
                         total += valueOfElement.total;
                    });
                    return total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                }
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a role="button" target="_blank" href="${host}/owner/pengiriman-pesanan/delivery-order/${data.id}" class="btn btn-info mr-2"><i class="fa fa-eye"></i> Nota</a><a role="button"  href="${host}/owner/pengiriman-pesanan/edit/${data.id}" class="btn btn-warning mr-2" ><i class="fa fa-edit"></i> Edit</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/pengiriman-pesanan/destroy/${data.id}','tb_pengiriman_pesanan')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_barang_masuk = $("#tb_barang_masuk").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/barang-masuk/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "tanggal" },
            { data: "keterangan" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a role="button" href="${host}/owner/barang-masuk/edit/${data.id}" class="btn btn-info mr-2" ><i class="fa fa-eye"></i> Detail</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/barang-masuk/destroy/${data.id}','tb_barang_masuk')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_barang_keluar = $("#tb_barang_keluar").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/barang-keluar/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "tanggal" },
            { data: "keterangan" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a role="button" href="${host}/owner/barang-keluar/edit/${data.id}" class="btn btn-info mr-2" ><i class="fa fa-eye"></i> Detail</a><button class="btn btn-danger mr-2" onclick="delete_data('owner/barang-keluar/destroy/${data.id}','tb_barang_keluar')"><i class="fa fa-trash"></i> Hapus</button>`;
                },
            },
        ],
    });

    tb_stok = $("#tb_stok").DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/stok/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "produk" },
            { data: "jumlah" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                width: "250px",
                sClass: "text-center",
                render: function (data) {
                    return `<a role="button"  href="${host}/owner/stok/riwayat/${data.id}" class="btn btn-info mr-2" ><i class="fa fa-edit"></i> Riwayat</a>`;
                },
            },
        ],
    });


    tb_general_persediaan = $('#tb_general_persediaan').DataTable({
        dom: 't',
        pageLength: -1,
        responsive: true,
        colReorder: !0,
        stateSave: !1,
        lengthMenu: [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        language: {
          "lengthMenu": " _MENU_ ",
          "zeroRecords": "Belum ada data",
        },
        order: [],
        columnDefs: [{
            "defaultContent": "-",
            targets: "_all",
          },
          {
            targets: 0,
            className: "text-center",
            visible: false
          },
        ],
    });

    tb_kasir = $('#tb_kasir').DataTable({
        dom: 't',
        pageLength: -1,
        responsive: true,
        colReorder: !0,
        stateSave: !1,
        lengthMenu: [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        language: {
          "lengthMenu": " _MENU_ ",
          "zeroRecords": "Belum ada data",
        },
        order: [],
        columnDefs: [{
            "defaultContent": "-",
            targets: "_all",
          },
          {
            targets: 0,
            className: "text-center",
            visible: false
          },
        ],
    });

    tb_riwayat_kasir = $('#tb_riwayat_kasir').DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/staff/kasir/riwayat/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "kode" },
            { data: "staff" },
            { data: "tanggal" },
            { data: "total" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: 4,
                render: function (data) {
                    return 'Rp. '+data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                },
                
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                sClass: "text-center",
                render: function (data) {
                    return `<a onclick="overlayForm('staff/kasir/riwayat/detail/${data.id}','Detail Transaksi Retail')" class="btn btn-info mr-2" ><i class="fa fa-edit"></i> Lihat Transaksi</a>`;
                },
            },
        ],
    });

    tb_retail_penjualan_owner = $('#tb_retail_penjualan_owner').DataTable({
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        searching: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: host + "/owner/retail-penjualan/getAll",
            async: true,
            error: function (res) {},
        },
        deferRender: true,
        responsive: !0,
        colReorder: !0,
        pagingType: "full_numbers",
        stateSave: !1,
        language: {
            zeroRecords: "Belum ada data...",
            processing: '<span class="text-danger">Mengambil Data....</span>',
        },
        columns: [
            { data: "id" },
            { data: "staff" },
            { data: "kode" },
            { data: "tanggal" },
            { data: "total" },
            { data: null },
        ],
        columnDefs: [
            {
                defaultContent: "-",
                targets: "_all",
            },
            {
                targets: 0,
                className: "dt-left",
                orderable: false,
                searchable: false,
                visible: false,
            },
            {
                targets: 4,
                render: function (data) {
                    return 'Rp. '+data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                },
                
            },
            {
                targets: -1,
                title: "Actions",
                orderable: false,
                searchable: false,
                sClass: "text-center",
                render: function (data) {
                    return `<a href="${host}/owner/retail-penjualan/detail_transaksi/${data.id}" class="badge badge-primary">Lihat Transaksi</a>`;
                },
            },
        ],
    });

    datatableModalInit = (table) =>{
        tabel = $(`#${table}`).DataTable({
            dom: 't',
            bLengthChange: true,
            bFilter: true,
            bInfo: true,
            bAutoWidth: true,
            searching: true,
            language: {
                zeroRecords: "Belum ada data...",
                processing: '<span class="text-danger">Mengambil Data....</span>',
            },
            columnDefs: [
                {
                    defaultContent: "-",
                    targets: "_all",
                },
                {
                    targets: 0,
                    className: "dt-left",
                    orderable: false,
                    searchable: false,
                    visible: false,
                }
            ],
        });
    }

    tesModal = () =>{
        alert('sdfgsdf');
    }

    dataTableDetailModal = (url,table,type,element) =>{
        
        let columns = {};
        let columnsDefs = {};
        let url_ = url;
        if (type == 'produk') {
            $(`#${table}`).DataTable().clear().draw();
            $(`#${table}`).DataTable().destroy();
            url_ = url + '/' + $(element).val();
            columns = {
                data: [
                    { data: "id" },
                    { data: "kode" },
                    { data: "kategori" },
                    { data: "nama" },
                ],   
            }

            columnsDefs = {
               data: [
                    {
                        defaultContent: "-",
                        targets: "_all",
                    },
                    {
                        targets: 0,
                        className: "dt-left",
                        orderable: false,
                        searchable: false,
                        visible: false,
                    }
                ],
            }

        } else if(type == 'pesanan_pembelian') {
            columns = {
                data: [
                    { data: "id" },
                    { data: "kode" },
                    { data: "supplier" },
                    { data: "tanggal" },
                ],   
            }

            columnsDefs = {
                data: [
                     {
                         defaultContent: "-",
                         targets: "_all",
                     },
                     {
                         targets: 0,
                         className: "dt-left",
                         orderable: false,
                         searchable: false,
                         visible: false,
                     }
                 ],
             }
        } else if(type == 'pengiriman_pesanan'){
            columns = {
                data: [
                    { data: "id" },
                    { data: "kode" },
                    { data: "pelanggan" },
                    { data: "tanggal" },
                ],   
            }

            columnsDefs = {
                data: [
                     {
                         defaultContent: "-",
                         targets: "_all",
                     },
                     {
                         targets: 0,
                         className: "dt-left",
                         orderable: false,
                         searchable: false,
                         visible: false,
                     }
                 ],
             }
        }else if(type == 'retur_pembelian'){
            columns = {
                data: [
                    { data: "id" },
                    { data: "kode" },
                    { data: "supplier" },
                    { data: "tanggal" },
                ],   
            }

            columnsDefs = {
                data: [
                     {
                         defaultContent: "-",
                         targets: "_all",
                     },
                     {
                         targets: 0,
                         className: "dt-left",
                         orderable: false,
                         searchable: false,
                         visible: false,
                     }
                 ],
             }
        }

        tabel = $(`#${table}`).DataTable({
            dom: 't',
            bLengthChange: true,
            bFilter: true,
            bInfo: true,
            bAutoWidth: true,
            searching: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: host + "/" + url_,
                async: true,
                error: function (res) {},
            },
            deferRender: true,
            responsive: !0,
            colReorder: !0,
            pagingType: "full_numbers",
            stateSave: !1,
            select: {
                style: 'single'
              },
            language: {
                zeroRecords: "Belum ada data...",
                processing: '<span class="text-danger">Mengambil Data....</span>',
            },
            columns  : columns.data,
            columnDefs: columnsDefs.data
        });
    }

    getDataDetail = () =>{
       
        let data = $('#tb_detail_persediaan').DataTable().row(".selected").data();
       
        if (data != undefined) {
            $('#tb_general_persediaan').DataTable().row.add([
                 data.id,
                 data.nama,
                 `<input type="number" class="form-control form-control-sm jumlah" value="0">`,
                 `<input type="text" class="form-control form-control-sm" value="Unit" readonly>`,
                 `<input type="text" class="form-control form-control-sm currency_format harga" value="0">`,
                 `<input type="text" class="form-control form-control-sm currency_format" readonly>`,
                 `<i class="ti-trash delete-table"></i>`
             ]).draw(); 
             notif("success", 'Produk/Barang di Tambahkan');
             currency('currency_format');
        }else{
         notif("warning", 'Anda belum memilih Produk/Barang');
        }
 
     }

     rowaddcontrolbarang = (url,type) =>{
        console.log(url);
        let data = $('#tb_detail_persanan_barang').DataTable().row(".selected").data();
        console.log(data);
       
        if (data != undefined) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                timeout: 50000,
                url: host + "/" + url,
                data: {
                    'id_header' : data.id
                },
                success: function(res) {
                    console.log(res);
                    if (res.type == 'pengiriman') {
                        $('#id_header_transaksi').val(res.header_id);
                        $('#id_header_retur').val('');
                    } else {
                        $('#id_header_retur').val(res.header_id);
                        $('#id_header_transaksi').val('');
                    }
                   
                   
                    $('#tb_general_persediaan').DataTable().clear().draw();
                    $.each(res.detail, function (indexInArray, valueOfElement) {
                        $('#tb_general_persediaan').DataTable().row.add([
                            valueOfElement.id,
                            valueOfElement.produk['nama'],
                            valueOfElement.jumlah,
                            valueOfElement.satuan,
                            valueOfElement.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"),
                            valueOfElement.total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"),
                        ]).draw(); 
                        notif("success", 'Produk/Barang di Tambahkan');
                        if (type == 'barang_keluar') {
                            $('#pelanggan').val(res.pelanggan);
                        }
                        currency('currency_format');
                    });
                    
                },
                error: function(xhr) {
                    notif("warning", 'Gagal');
                }
            });

         
        }else{
         notif("warning", 'Anda belum memilih Pesanan Pembelian');
        }
 
     }

    $('#tb_general_persediaan').on("click", '.delete-table', function () {
        $('#tb_general_persediaan').DataTable().row($(this).parents('tr')).remove().draw(false);
    });

    $('#tb_general_persediaan').on("keyup", '.harga', function () {
        let harga = $(this).val();
        let index = $(this).closest('tr').index();
        let jumlah = $('#tb_general_persediaan').DataTable().cell(index, 2).nodes().to$().find('input').val();
        let total = 0;

        total = harga.replace(/,/g, '') * jumlah;

         $('#tb_general_persediaan').DataTable().cell(index, 5).nodes().to$().find('input').val(total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
    });

    $('#tb_general_persediaan').on("keyup change", '.jumlah', function () {
        let jumlah = $(this).val();
        let index = $(this).closest('tr').index();
        let harga = $('#tb_general_persediaan').DataTable().cell(index, 4).nodes().to$().find('input').val();
        let total = 0;

        total = harga.replace(/,/g, '') * jumlah;

         $('#tb_general_persediaan').DataTable().cell(index, 5).nodes().to$().find('input').val(total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
    });

})