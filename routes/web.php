<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homepageController@index')->name('homepage.index');
Route::get('/tentang', 'homepageController@tentang')->name('homepage.tentang');
Route::get('/belanja/list', 'homepageController@belanja_list')->name('homepage.belanja_list');
Route::get('/produk/detail/{paramas}', 'homepageController@produk_detail')->name('homepage.produk_detail');
Route::get('/page-login', 'homepageController@page_login')->name('homepage.page_login');
Route::get('/page-register', 'homepageController@page_register')->name('homepage.page_register');
Route::get('/page-logout', 'homepageController@page_logout')->name('homepage.page_logout');
Route::post('/page-login-post', 'homepageController@page_login_post')->name('homepage.page_login_post');
Route::post('/page-register-post', 'homepageController@page_register_post')->name('homepage.page_register_post');
Route::get('/kontak', 'homepageController@kontak')->name('homepage.kontak');
Route::get('/keranjang', 'homepageController@keranjang')->name('homepage.keranjang');
Route::post('/store-kontak', 'homepageController@storekontak');
Route::post('/store-cart', 'homepageController@storecart');
Route::post('/set-cart', 'homepageController@setcart');
Route::post('/del-cart', 'homepageController@delcart');
Route::post('/get-ongkir-view', 'homepageController@getongkirview');
Route::post('/checkout', 'homepageController@checkout');
Route::get('/transaksi/{id}', 'homepageController@transaksi_view');
Route::post('/transaksi', 'homepageController@transaksi');
Route::post('/upload-foto-bayar', 'homepageController@upload_foto_bayar');

Route::get('/tagihan-order', 'homepageController@tagihanOrder')->name('homepage.tagihan');
Route::get('/tagihan/bukti-pembayaran/{params}', 'homepageController@buktiPembayaran')->name('homepage.tagihan.buktipembayaran');

Route::get('/riwayat-pesanan', 'homepageController@riwayatPesanan')->name('homepage.riwayat');
Route::get('/get-detail-pesanan', 'homepageController@getDetailPesanan');

Route::get('/profil', 'homepageController@profil')->name('homepage.profil');
Route::post('/edit-profil', 'homepageController@editProfil');
// Home page resource
Route::get('/source/hero-section', 'sourcePageController@getheroSection')->name('homepage.getheroSection');
Route::get('/source/get-produk-terbaru', 'sourcePageController@getProdukTerbaru')->name('homepage.getProdukTerbaru');
Route::get('/source/get-produk-terlaris', 'sourcePageController@getProdukTerlaris')->name('homepage.getProdukTerlaris');
Route::get('/source/get-testimonial', 'sourcePageController@getTestimonial')->name('homepage.getTestimonial');
Route::get('/source/get-belanja', 'sourcePageController@getBelanja');
Route::get('/source/get-kategori', 'sourcePageController@getKategori');
Route::get('/source/get-location', 'sourcePageController@getLocation');
Route::post('/source/get-count-cart', 'sourcePageController@getCountCart');

// GOOGLE
Route::get('/auth/google', 'googleController@redirectToProvider')->name('google.auth');
Route::get('/auth/google/callback', 'googleController@handleGoogleCallback')->name('google.auth.callback');
// 

Auth::routes();

// Route::get('/', 'tesController@index')->name('tes.app');

// Route::any('{slug}', function () {
//     return view('welcome');
// });

// Route::get('/{any}', 'frontController@index')->where('any', '.*');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'owner', 'middleware' => 'owner'], function () {
    // Dashboard
    Route::get('dashboard', 'ownerController@index')->name('owner.dashboard');
    // 

    // Kategori
    Route::get('kategori', 'module\masterdata\kategoriController@index')->name('owner.masterdata.kategori');
    Route::get('kategori/getall', 'module\masterdata\kategoriController@getAll')->name('owner.masterdata.kategori.getAll');
    Route::get('kategori/create', 'module\masterdata\kategoriController@create')->name('owner.masterdata.kategori.create');
    Route::post('kategori/store', 'module\masterdata\kategoriController@store')->name('owner.masterdata.kategori.store');
    Route::get('kategori/edit/{id}', 'module\masterdata\kategoriController@edit')->name('owner.masterdata.kategori.edit');
    Route::post('kategori/update/{id}', 'module\masterdata\kategoriController@update')->name('owner.masterdata.kategori.update');
    Route::delete('kategori/destroy/{id}', 'module\masterdata\kategoriController@destroy')->name('owner.masterdata.kategori.destroy');
    //

    // Pengaturan Website
    Route::get('pengaturan-website/jumbotron', 'module\pengaturanWebsiteController@jumbotron')->name('owner.pengaturan_website.jumbotron');
    Route::post('pengaturan-website/jumbotronStore/{params}', 'module\pengaturanWebsiteController@jumbotronStore')->name('owner.pengaturan_website.jumbotronStore');
    Route::post('pengaturan-website/hero-kategori', 'module\pengaturanWebsiteController@hero_kategori')->name('owner.pengaturan_website.hero_kategori');


    // Testimonial
    Route::get('pengaturan-website/testimonial', 'module\pengaturanWebsiteController@testimonial')->name('owner.pengaturan_website.testimonial');
    Route::get('pengaturan-website/form_testimonial', 'module\pengaturanWebsiteController@form_testimonial')->name('owner.pengaturan_website.form_testimonial');
    Route::post('pengaturan-website/post_testimonial', 'module\pengaturanWebsiteController@post_testimonial')->name('owner.pengaturan_website.post_testimonial');
    Route::post('pengaturan-website/update_testimonial/{params}', 'module\pengaturanWebsiteController@update_testimonial')->name('owner.pengaturan_website.update_testimonial');
    Route::get('pengaturan-website/getAllTestimonial', 'module\pengaturanWebsiteController@getAllTestimonial')->name('owner.pengaturan_website.getAllTestimonial');
    Route::get('pengaturan-website/edit-testimoni/{params}', 'module\pengaturanWebsiteController@editTestimoni')->name('owner.pengaturan_website.editTestimoni');
    Route::delete('pengaturan-website/delete-testimoni/{params}', 'module\pengaturanWebsiteController@deleteTestimoni')->name('owner.pengaturan_website.deleteTestimoni');
    // 

    // Supplier
    Route::get('supplier/getall', 'module\masterdata\supplierController@getAll')->name('owner.masterdata.supplier.getAll');
    Route::get('supplier', 'module\masterdata\supplierController@index')->name('owner.masterdata.supplier');
    Route::get('supplier/create', 'module\masterdata\supplierController@create')->name('owner.masterdata.supplier.create');
    Route::post('supplier/store', 'module\masterdata\supplierController@store')->name('owner.masterdata.supplier.store');
    Route::get('supplier/edit/{id}', 'module\masterdata\supplierController@edit')->name('owner.masterdata.supplier.edit');
    Route::post('supplier/update/{id}', 'module\masterdata\supplierController@update')->name('owner.masterdata.supplier.update');
    Route::delete('supplier/destroy/{id}', 'module\masterdata\supplierController@destroy')->name('owner.masterdata.supplier.destroy');
    // 

    // Satuan
    Route::get('satuan/getall', 'module\masterdata\satuanController@getAll')->name('owner.masterdata.satuan.getAll');
    Route::get('satuan', 'module\masterdata\satuanController@index')->name('owner.masterdata.satuan');
    Route::get('satuan/create', 'module\masterdata\satuanController@create')->name('owner.masterdata.satuan.create');
    Route::post('satuan/store', 'module\masterdata\satuanController@store')->name('owner.masterdata.satuan.store');
    Route::get('satuan/edit/{id}', 'module\masterdata\satuanController@edit')->name('owner.masterdata.satuan.edit');
    Route::post('satuan/update/{id}', 'module\masterdata\satuanController@update')->name('owner.masterdata.satuan.update');
    Route::delete('satuan/destroy/{id}', 'module\masterdata\satuanController@destroy')->name('owner.masterdata.satuan.destroy');
    //

    // Produk
    Route::get('produk/getall', 'module\produk\produkController@getAll')->name('owner.produk.getAll');
    Route::get('produk', 'module\produk\produkController@index')->name('owner.produk.index');
    Route::get('produk/create', 'module\produk\produkController@create')->name('owner.produk.create');
    Route::get('produk/detail/{id}', 'module\produk\produkController@detail')->name('owner.produk.detail');
    Route::post('produk/store', 'module\produk\produkController@store')->name('owner.produk.store');
    Route::get('produk/edit/{id}', 'module\produk\produkController@edit')->name('owner.produk.edit');
    Route::post('produk/update/{params}', 'module\produk\produkController@update')->name('owner.produk.update');
    Route::get('produk/getByKategori/{id}', 'module\produk\produkController@getByKategori')->name('owner.produk.getByKategori');
    // 

    // Pesanan Pembelian
    Route::get('pesanan-pembelian', 'module\persediaan\pesananpembelianController@index')->name('owner.persediaan.pesanan_pembelian.index');
    Route::get('pesanan-pembelian/getAll', 'module\persediaan\pesananpembelianController@getAll')->name('owner.persediaan.pesanan_pembelian.getAll');
    Route::get('pesanan-pembelian/getAll/bySupplier/{params}', 'module\persediaan\pesananpembelianController@bySupplier')->name('owner.persediaan.pesanan_pembelian.bySupplier');
    Route::post('pesanan-pembelian/getAll/getDetail', 'module\persediaan\pesananpembelianController@getDetail')->name('owner.persediaan.pesanan_pembelian.getDetail');
    Route::get('pesanan-pembelian/create', 'module\persediaan\pesananpembelianController@create')->name('owner.persediaan.pesanan_pembelian.create');
    Route::get('pesanan-pembelian/edit/{params}', 'module\persediaan\pesananpembelianController@edit')->name('owner.persediaan.pesanan_pembelian.edit');
    Route::post('pesanan-pembelian/store', 'module\persediaan\pesananpembelianController@store')->name('owner.persediaan.pesanan_pembelian.store');
    Route::post('pesanan-pembelian/update/{params}', 'module\persediaan\pesananpembelianController@update')->name('owner.persediaan.pesanan_pembelian.update');
    Route::delete('pesanan-pembelian/destroy/{params}', 'module\persediaan\pesananpembelianController@destroy')->name('owner.persediaan.pesanan_pembelian.destroy');
    Route::get('pesanan-pembelian/detail-pesanan', 'module\persediaan\pesananpembelianController@detail_pesanan')->name('owner.persediaan.pesanan_pembelian.detail_pesanan');
    Route::get('pesanan-pembelian/purchase_order/{paramss}', 'module\persediaan\pesananpembelianController@purchase_order')->name('owner.persediaan.pesanan_pembelian.purchase_order');


    // Barang Masuk 
    Route::get('barang-masuk', 'module\persediaan\barangmasukController@index')->name('owner.persediaan.barangmasuk.index');
    Route::get('barang-masuk/create', 'module\persediaan\barangmasukController@create')->name('owner.persediaan.barangmasuk.create');
    Route::get('barang-masuk/edit/{params}', 'module\persediaan\barangmasukController@edit')->name('owner.persediaan.barangmasuk.edit');
    Route::post('barang-masuk/store', 'module\persediaan\barangmasukController@store')->name('owner.persediaan.barangmasuk.store');
    Route::post('barang-masuk/update/{params}', 'module\persediaan\barangmasukController@update')->name('owner.persediaan.barangmasuk.update');
    Route::get('barang-masuk/getAll', 'module\persediaan\barangmasukController@getAll')->name('owner.persediaan.barangmasuk.getAll');
    Route::get('barang-masuk/edit/{params}', 'module\persediaan\barangmasukController@edit')->name('owner.persediaan.barangmasuk.edit');
    Route::delete('barang-masuk/destroy/{params}', 'module\persediaan\barangmasukController@destroy')->name('owner.persediaan.barangmasuk.destroy');
    Route::get('barang-masuk/bysupplier', 'module\persediaan\barangmasukController@bysupplier')->name('owner.persediaan.barangmasuk.bysupplier');

    //   Stok
    Route::get('stok', 'module\persediaan\stokController@index')->name('owner.persediaan.stok.index');
    Route::get('stok/getAll', 'module\persediaan\stokController@getAll')->name('owner.persediaan.stok.getAll');
    Route::get('stok/riwayat/{params}', 'module\persediaan\stokController@riwayat')->name('owner.persediaan.stok.riwayat');

    // Pengiriman Pesanan
    Route::get('pengiriman-pesanan', 'module\persediaan\pengirimanPesananController@index')->name('owner.persediaan.pengiriman.index');
    Route::get('pengiriman-pesanan/getAll', 'module\persediaan\pengirimanPesananController@getAll')->name('owner.persediaan.pengiriman.getAll');
    Route::get('pengiriman-pesanan/create', 'module\persediaan\pengirimanPesananController@create')->name('owner.persediaan.pengiriman.create');
    Route::post('pengiriman-pesanan/store', 'module\persediaan\pengirimanPesananController@store')->name('owner.persediaan.pengiriman.store');
    Route::get('pengiriman-pesanan/edit/{params}', 'module\persediaan\pengirimanPesananController@edit')->name('owner.persediaan.pengiriman.edit');
    Route::post('pengiriman-pesanan/update/{params}', 'module\persediaan\pengirimanPesananController@update')->name('owner.persediaan.pengiriman.update');
    Route::get('pengiriman-pesanan/belum-selesai/{params}', 'module\persediaan\pengirimanPesananController@belum_selesai')->name('owner.persediaan.pengiriman.belum_selesai');
    Route::get('pengiriman-pesanan/detail-pesanan', 'module\persediaan\pengirimanPesananController@detail_pesanan')->name('owner.persediaan.pengiriman.detail_pesanan');
    Route::post('pengiriman-pesanan/getDetail', 'module\persediaan\pengirimanPesananController@getDetail')->name('owner.persediaan.pengiriman.getDetail');
    Route::delete('pengiriman-pesanan/destroy/{params}', 'module\persediaan\pengirimanPesananController@destroy')->name('owner.persediaan.pengiriman.destroy');
    Route::get('pengiriman-pesanan/delivery-order/{params}', 'module\persediaan\pengirimanPesananController@deliveryorder')->name('owner.persediaan.pengiriman.deliveryorder');

    // Barang keluar
    Route::get('barang-keluar', 'module\persediaan\barangkeluarController@index')->name('owner.persediaan.barangkeluar.index');
    Route::get('barang-keluar/create', 'module\persediaan\barangkeluarController@create')->name('owner.persediaan.barangkeluar.create');
    Route::get('barang-keluar/detailPengiriman', 'module\persediaan\barangkeluarController@detailPengiriman')->name('owner.persediaan.barangmasuk.detailPengiriman');
    Route::get('barang-keluar/detailRetur', 'module\persediaan\barangkeluarController@detailRetur')->name('owner.persediaan.barangmasuk.detailRetur');
    Route::get('barang-keluar/edit/{params}', 'module\persediaan\barangkeluarController@edit')->name('owner.persediaan.barangkeluar.edit');
    Route::post('barang-keluar/store', 'module\persediaan\barangkeluarController@store')->name('owner.persediaan.barangkeluar.store');
    Route::post('barang-keluar/update/{params}', 'module\persediaan\barangkeluarController@update')->name('owner.persediaan.barangkeluar.update');
    Route::get('barang-keluar/getAll', 'module\persediaan\barangkeluarController@getAll')->name('owner.persediaan.barangkeluar.getAll');

    // Retail Penjualan
    Route::get('retail-penjualan', 'module\retail_penjualan\retailPenjualanController@index')->name('owner.retail_penjualan');
    Route::get('retail-penjualan/getAll', 'module\retail_penjualan\retailPenjualanController@getAll')->name('owner.retail_penjualan.getAll');
    Route::get('retail-penjualan/detail_transaksi/{params}', 'module\retail_penjualan\retailPenjualanController@detail_transaksi')->name('owner.retail_penjualan.detail_transaksi');

    // RETUR Pembelian
    Route::get('retur-pembelian', 'module\retur\returPembelianController@index')->name('owner.retur_pembelian');
    Route::get('retur-pembelian/getAll', 'module\retur\returPembelianController@getAll')->name('owner.retur_pembelian.getAll');
    Route::get('retur-pembelian/create', 'module\retur\returPembelianController@create')->name('owner.retur_pembelian.create');
    Route::get('retur-pembelian/edit/{params}', 'module\retur\returPembelianController@edit')->name('owner.retur_pembelian.edit');
    Route::get('retur-pembelian/belum-selesai/{params}', 'module\retur\returPembelianController@belumSelesai')->name('owner.retur_pembelian.belumSelesai');
    Route::post('retur-pembelian/store', 'module\retur\returPembelianController@store')->name('owner.retur_pembelian.store');
    Route::post('retur-pembelian/update/{params}', 'module\retur\returPembelianController@update')->name('owner.retur_pembelian.update'); 
    Route::delete('retur-pembelian/destroy/{params}', 'module\retur\returPembelianController@destroy')->name('owner.retur_pembelian.destroy'); 
    Route::post('retur-pembelian/getDetail', 'module\retur\returPembelianController@getDetail')->name('owner.retur_pembelian.getDetail');

      // RETUR Penjualan
      Route::get('retur-penjualan', 'module\retur\returPenjualanController@index')->name('owner.retur_penjualan');
      Route::get('retur-penjualan/getAll', 'module\retur\returPenjualanController@getAll')->name('owner.retur_penjualan.getAll');
      Route::get('retur-penjualan/create', 'module\retur\returPenjualanController@create')->name('owner.retur_penjualan.create');
      Route::get('retur-penjualan/edit/{params}', 'module\retur\returPenjualanController@edit')->name('owner.retur_penjualan.edit');
      Route::get('retur-penjualan/belum-selesai/{params}', 'module\retur\returPenjualanController@belumSelesai')->name('owner.retur_penjualan.belumSelesai');
      Route::post('retur-penjualan/store', 'module\retur\returPenjualanController@store')->name('owner.retur_penjualan.store');
      Route::post('retur-penjualan/update/{params}', 'module\retur\returPenjualanController@update')->name('owner.retur_penjualan.update'); 
      Route::delete('retur-penjualan/destroy/{params}', 'module\retur\returPenjualanController@destroy')->name('owner.retur_penjualan.destroy'); 
      Route::post('retur-penjualan/getDetail', 'module\retur\returPenjualanController@getDetail')->name('owner.retur_penjualan.getDetail');

    // Route::get('barang-masuk/edit/{params}', 'module\persediaan\barangmasukController@edit')->name('owner.persediaan.barangmasuk.edit');
    // Route::delete('barang-masuk/destroy/{params}', 'module\persediaan\barangmasukController@destroy')->name('owner.persediaan.barangmasuk.destroy');

    // Kelola Pesanan
    Route::get('pesanan/kelola-pesanan/{page}', 'module\pesanan\pesananController@view');
    Route::get('pesanan/getall', 'module\pesanan\pesananController@getAll');
    Route::get('pesanan/getallfinish', 'module\pesanan\pesananController@getAllFinish');
    Route::get('pesanan/getdetail', 'module\pesanan\pesananController@getDetail');
    Route::get('pesanan/getfotobukti', 'module\pesanan\pesananController@getFotoBukti');
    Route::post('pesanan/proses', 'module\pesanan\pesananController@proses');
});

Route::group(['prefix' => 'staff', 'middleware' => 'staff'], function () {
    Route::get('dashboard', 'staffController@index')->name('staff.dashboard');
    Route::get('kasir', 'staffController@kasir')->name('staff.kasir');
    Route::get('kasir/getByIDProduk/{params}', 'staffController@getByIDProduk')->name('staff.getByIDProduk');
    Route::post('kasir/store', 'staffController@store')->name('staff.store');
    Route::get('kasir/riwayat', 'staffController@riwayat')->name('staff.riwayat');
    Route::get('kasir/riwayat/getAll', 'staffController@getRiwayat')->name('staff.getRiwayat');
    Route::get('kasir/riwayat/detail/{params}', 'staffController@getRiwayatdetail')->name('staff.getRiwayatdetail');
    Route::get('kasir/nota/penjualan/{params}', 'staffController@nota')->name('staff.nota');
});
