<?php

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


      // Barang Masuk 
      Route::get('barang-masuk', 'module\persediaan\barangmasukController@index')->name('owner.persediaan.barangmasuk.index');
      Route::get('barang-masuk/create', 'module\persediaan\barangmasukController@create')->name('owner.persediaan.barangmasuk.create');
      Route::post('barang-masuk/store', 'module\persediaan\barangmasukController@store')->name('owner.persediaan.barangmasuk.store');
      Route::get('barang-masuk/getAll', 'module\persediaan\barangmasukController@getAll')->name('owner.persediaan.barangmasuk.getAll');
      Route::get('barang-masuk/edit/{params}', 'module\persediaan\barangmasukController@edit')->name('owner.persediaan.barangmasuk.edit');
      Route::delete('barang-masuk/destroy/{params}', 'module\persediaan\barangmasukController@destroy')->name('owner.persediaan.barangmasuk.destroy');
      Route::get('barang-masuk/bysupplier', 'module\persediaan\barangmasukController@bysupplier')->name('owner.persediaan.barangmasuk.bysupplier');
});

Route::group(['prefix' => 'staff', 'middleware' => 'staff'], function () {
    Route::get('dashboard', 'staffController@index')->name('staff.dashboard');
});
