<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);

    Route::get('/kategori', 'App\Http\Controllers\KategoriController@index');
    Route::get('/kategori/tambah', 'App\Http\Controllers\KategoriController@tambah');
    // Route::get('/kategori/trash', 'App\Http\Controllers\KategoriController@trash');
    // Route::get('/kategori/kembalikan/{id}', 'App\Http\Controllers\KategoriController@kembalikan');
    // Route::get('/kategori/hapus-permanen/{id}', 'App\Http\Controllers\KategoriController@hapus_permanen');
    // Route::get('/kategori/kembalikan-semua', 'App\Http\Controllers\KategoriController@kembalikan_semua');
    // Route::get('/kategori/hapus-permanen-semua', 'App\Http\Controllers\KategoriController@hapus_permanen_semua');
    Route::post('/kategori/store', 'App\Http\Controllers\KategoriController@store');
    Route::get('/kategori/edit/{id}', 'App\Http\Controllers\KategoriController@edit');
    Route::put('/kategori/update/{id}', 'App\Http\Controllers\KategoriController@update');
    Route::get('/kategori/hapus/{id}', 'App\Http\Controllers\KategoriController@delete');
    Route::get('/kategori/search', 'App\Http\Controllers\KategoriController@search');

    Route::get('/merk', 'App\Http\Controllers\MerkController@index');
    Route::get('/merk/tambah', 'App\Http\Controllers\MerkController@tambah');
    // Route::get('/merk/trash', 'App\Http\Controllers\MerkController@trash');
    // Route::get('/merk/kembalikan/{id}', 'App\Http\Controllers\MerkController@kembalikan');
    // Route::get('/merk/hapus-permanen/{id}', 'App\Http\Controllers\MerkController@hapus_permanen');
    // Route::get('/merk/kembalikan-semua', 'App\Http\Controllers\MerkController@kembalikan_semua');
    // Route::get('/merk/hapus-permanen-semua', 'App\Http\Controllers\MerkController@hapus_permanen_semua');
    Route::post('/merk/store', 'App\Http\Controllers\MerkController@store');
    Route::get('/merk/edit/{id}', 'App\Http\Controllers\MerkController@edit');
    Route::put('/merk/update/{id}', 'App\Http\Controllers\MerkController@update');
    Route::get('/merk/hapus/{id}', 'App\Http\Controllers\MerkController@delete');
    Route::get('/merk/search', 'App\Http\Controllers\MerkController@search');

    Route::get('/warna', 'App\Http\Controllers\WarnaController@index');
    Route::get('/warna/tambah', 'App\Http\Controllers\WarnaController@tambah');
    // Route::get('/warna/trash', 'App\Http\Controllers\WarnaController@trash');
    // Route::get('/warna/kembalikan/{id}', 'App\Http\Controllers\WarnaController@kembalikan');
    // Route::get('/warna/hapus-permanen/{id}', 'App\Http\Controllers\WarnaController@hapus_permanen');
    // Route::get('/warna/kembalikan-semua', 'App\Http\Controllers\WarnaController@kembalikan_semua');
    // Route::get('/warna/hapus-permanen-semua', 'App\Http\Controllers\WarnaController@hapus_permanen_semua');
    Route::post('/warna/store', 'App\Http\Controllers\WarnaController@store');
    Route::get('/warna/edit/{id}', 'App\Http\Controllers\WarnaController@edit');
    Route::put('/warna/update/{id}', 'App\Http\Controllers\WarnaController@update');
    Route::get('/warna/hapus/{id}', 'App\Http\Controllers\WarnaController@delete');
    Route::get('/warna/search', 'App\Http\Controllers\WarnaController@search');

    Route::get('/size', 'App\Http\Controllers\SizeController@index');
    Route::get('/size/tambah', 'App\Http\Controllers\SizeController@tambah');
    // Route::get('/size/trash', 'App\Http\Controllers\SizeController@trash');
    // Route::get('/size/kembalikan/{id}', 'App\Http\Controllers\SizeController@kembalikan');
    // Route::get('/size/hapus-permanen/{id}', 'App\Http\Controllers\SizeController@hapus_permanen');
    // Route::get('/size/kembalikan-semua', 'App\Http\Controllers\SizeController@kembalikan_semua');
    // Route::get('/size/hapus-permanen-semua', 'App\Http\Controllers\SizeController@hapus_permanen_semua');
    Route::post('/size/store', 'App\Http\Controllers\SizeController@store');
    Route::get('/size/edit/{id}', 'App\Http\Controllers\SizeController@edit');
    Route::put('/size/update/{id}', 'App\Http\Controllers\SizeController@update');
    Route::get('/size/hapus/{id}', 'App\Http\Controllers\SizeController@delete');
    Route::get('/size/search', 'App\Http\Controllers\SizeController@search');

    Route::get('/barang', 'App\Http\Controllers\BarangController@index');
    Route::get('/barang/tambah', 'App\Http\Controllers\BarangController@tambah');
    Route::post('/barang/store', 'App\Http\Controllers\BarangController@store');
    // Route::get('/barang/trash', 'App\Http\Controllers\BarangController@trash');
    // Route::get('/barang/kembalikan/{id}', 'App\Http\Controllers\BarangController@kembalikan');
    // Route::get('/barang/hapus-permanen/{id}', 'App\Http\Controllers\BarangController@hapus_permanen');
    // Route::get('/barang/kembalikan-semua', 'App\Http\Controllers\BarangController@kembalikan_semua');
    // Route::get('/barang/hapus-permanen-semua', 'App\Http\Controllers\BarangController@hapus_permanen_semua');
    Route::get('/barang/edit/{id}', 'App\Http\Controllers\BarangController@edit');
    Route::put('/barang/update/{id}', 'App\Http\Controllers\BarangController@update');
    Route::get('/barang/hapus/{id}', 'App\Http\Controllers\BarangController@delete');
    Route::get('/barang/search', 'App\Http\Controllers\BarangController@search');

    Route::get('/barang-masuk', 'App\Http\Controllers\BarangMasukController@index');
    Route::get('/barang-masuk/tambah', 'App\Http\Controllers\BarangMasukController@tambah');
    Route::post('/barang-masuk/store', 'App\Http\Controllers\BarangMasukController@store');
    Route::get('/barang-masuk/edit/{id}', 'App\Http\Controllers\BarangMasukController@edit');
    Route::put('/barang-masuk/update/{id}', 'App\Http\Controllers\BarangMasukController@update');
    Route::get('/barang-masuk/hapus/{id}', 'App\Http\Controllers\BarangMasukController@delete');
    // Route::get('/barang-masuk/store/gagal', 'App\Http\Controllers\BarangMasukController@gagal');
    Route::get('/barang-masuk/search', 'App\Http\Controllers\BarangMasukController@search');

    Route::get('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@index');
    Route::get('/barang-keluar/tambah', 'App\Http\Controllers\BarangKeluarController@tambah');
    Route::post('/barang-keluar/store', 'App\Http\Controllers\BarangKeluarController@store');
    Route::get('/barang-keluar/edit/{id}', 'App\Http\Controllers\BarangKeluarController@edit');
    Route::put('/barang-keluar/update/{id}', 'App\Http\Controllers\BarangKeluarController@update');
    Route::get('/barang-keluar/hapus/{id}', 'App\Http\Controllers\BarangKeluarController@delete');
    // Route::get('/barang-keluar/store/gagal', 'App\Http\Controllers\BarangKeluarController@gagal');
    // Route::get('/barang-keluar/store/gagal2/{id}', 'App\Http\Controllers\BarangKeluarController@gagal2');
    Route::get('/barang-keluar/search', 'App\Http\Controllers\BarangKeluarController@search');

    Route::get('/retur', 'App\Http\Controllers\ReturController@index');
    Route::get('/retur/tambah', 'App\Http\Controllers\ReturController@tambah');
    Route::post('/retur/store', 'App\Http\Controllers\ReturController@store');
    Route::get('/retur/edit/{id}', 'App\Http\Controllers\ReturController@edit');
    Route::put('/retur/update/{id}', 'App\Http\Controllers\ReturController@update');
    Route::get('/retur/hapus/{id}', 'App\Http\Controllers\ReturController@delete');
    // Route::get('/retur/store/gagal', 'App\Http\Controllers\ReturController@gagal');
    // Route::get('/retur/store/gagal2/{id}', 'App\Http\Controllers\ReturController@gagal2');
    // Route::get('/retur/store/gagal3', 'App\Http\Controllers\ReturController@gagal3');
    Route::get('/retur/search', 'App\Http\Controllers\ReturController@search');
});

// Route::get('/kategori', 'App\Http\Controllers\KategoriController@index');
// Route::get('/kategori/tambah', 'App\Http\Controllers\KategoriController@tambah');
// // Route::get('/kategori/trash', 'App\Http\Controllers\KategoriController@trash');
// // Route::get('/kategori/kembalikan/{id}', 'App\Http\Controllers\KategoriController@kembalikan');
// // Route::get('/kategori/hapus-permanen/{id}', 'App\Http\Controllers\KategoriController@hapus_permanen');
// // Route::get('/kategori/kembalikan-semua', 'App\Http\Controllers\KategoriController@kembalikan_semua');
// // Route::get('/kategori/hapus-permanen-semua', 'App\Http\Controllers\KategoriController@hapus_permanen_semua');
// Route::post('/kategori/store', 'App\Http\Controllers\KategoriController@store');
// Route::get('/kategori/edit/{id}', 'App\Http\Controllers\KategoriController@edit');
// Route::put('/kategori/update/{id}', 'App\Http\Controllers\KategoriController@update');
// Route::get('/kategori/hapus/{id}', 'App\Http\Controllers\KategoriController@delete');

// Route::get('/merk', 'App\Http\Controllers\MerkController@index');
// Route::get('/merk/tambah', 'App\Http\Controllers\MerkController@tambah');
// // Route::get('/merk/trash', 'App\Http\Controllers\MerkController@trash');
// // Route::get('/merk/kembalikan/{id}', 'App\Http\Controllers\MerkController@kembalikan');
// // Route::get('/merk/hapus-permanen/{id}', 'App\Http\Controllers\MerkController@hapus_permanen');
// // Route::get('/merk/kembalikan-semua', 'App\Http\Controllers\MerkController@kembalikan_semua');
// // Route::get('/merk/hapus-permanen-semua', 'App\Http\Controllers\MerkController@hapus_permanen_semua');
// Route::post('/merk/store', 'App\Http\Controllers\MerkController@store');
// Route::get('/merk/edit/{id}', 'App\Http\Controllers\MerkController@edit');
// Route::put('/merk/update/{id}', 'App\Http\Controllers\MerkController@update');
// Route::get('/merk/hapus/{id}', 'App\Http\Controllers\MerkController@delete');

// Route::get('/warna', 'App\Http\Controllers\WarnaController@index');
// Route::get('/warna/tambah', 'App\Http\Controllers\WarnaController@tambah');
// // Route::get('/warna/trash', 'App\Http\Controllers\WarnaController@trash');
// // Route::get('/warna/kembalikan/{id}', 'App\Http\Controllers\WarnaController@kembalikan');
// // Route::get('/warna/hapus-permanen/{id}', 'App\Http\Controllers\WarnaController@hapus_permanen');
// // Route::get('/warna/kembalikan-semua', 'App\Http\Controllers\WarnaController@kembalikan_semua');
// // Route::get('/warna/hapus-permanen-semua', 'App\Http\Controllers\WarnaController@hapus_permanen_semua');
// Route::post('/warna/store', 'App\Http\Controllers\WarnaController@store');
// Route::get('/warna/edit/{id}', 'App\Http\Controllers\WarnaController@edit');
// Route::put('/warna/update/{id}', 'App\Http\Controllers\WarnaController@update');
// Route::get('/warna/hapus/{id}', 'App\Http\Controllers\WarnaController@delete');

// Route::get('/size', 'App\Http\Controllers\SizeController@index');
// Route::get('/size/tambah', 'App\Http\Controllers\SizeController@tambah');
// // Route::get('/size/trash', 'App\Http\Controllers\SizeController@trash');
// // Route::get('/size/kembalikan/{id}', 'App\Http\Controllers\SizeController@kembalikan');
// // Route::get('/size/hapus-permanen/{id}', 'App\Http\Controllers\SizeController@hapus_permanen');
// // Route::get('/size/kembalikan-semua', 'App\Http\Controllers\SizeController@kembalikan_semua');
// // Route::get('/size/hapus-permanen-semua', 'App\Http\Controllers\SizeController@hapus_permanen_semua');
// Route::post('/size/store', 'App\Http\Controllers\SizeController@store');
// Route::get('/size/edit/{id}', 'App\Http\Controllers\SizeController@edit');
// Route::put('/size/update/{id}', 'App\Http\Controllers\SizeController@update');
// Route::get('/size/hapus/{id}', 'App\Http\Controllers\SizeController@delete');

// Route::get('/barang', 'App\Http\Controllers\BarangController@index');
// Route::get('/barang/tambah', 'App\Http\Controllers\BarangController@tambah');
// Route::post('/barang/store', 'App\Http\Controllers\BarangController@store');
// // Route::get('/barang/trash', 'App\Http\Controllers\BarangController@trash');
// // Route::get('/barang/kembalikan/{id}', 'App\Http\Controllers\BarangController@kembalikan');
// // Route::get('/barang/hapus-permanen/{id}', 'App\Http\Controllers\BarangController@hapus_permanen');
// // Route::get('/barang/kembalikan-semua', 'App\Http\Controllers\BarangController@kembalikan_semua');
// // Route::get('/barang/hapus-permanen-semua', 'App\Http\Controllers\BarangController@hapus_permanen_semua');
// Route::get('/barang/edit/{id}', 'App\Http\Controllers\BarangController@edit');
// Route::put('/barang/update/{id}', 'App\Http\Controllers\BarangController@update');
// Route::get('/barang/hapus/{id}', 'App\Http\Controllers\BarangController@delete');

// Route::get('/barang-masuk', 'App\Http\Controllers\BarangMasukController@index');
// Route::get('/barang-masuk/tambah', 'App\Http\Controllers\BarangMasukController@tambah');
// Route::post('/barang-masuk/store', 'App\Http\Controllers\BarangMasukController@store');
// Route::get('/barang-masuk/edit/{id}', 'App\Http\Controllers\BarangMasukController@edit');
// Route::put('/barang-masuk/update/{id}', 'App\Http\Controllers\BarangMasukController@update');
// Route::get('/barang-masuk/hapus/{id}', 'App\Http\Controllers\BarangMasukController@delete');
Route::get('/barang-masuk/store/gagal', 'App\Http\Controllers\BarangMasukController@gagal');

// Route::get('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@index');
// Route::get('/barang-keluar/tambah', 'App\Http\Controllers\BarangKeluarController@tambah');
// Route::post('/barang-keluar/store', 'App\Http\Controllers\BarangKeluarController@store');
// Route::get('/barang-keluar/edit/{id}', 'App\Http\Controllers\BarangKeluarController@edit');
// Route::put('/barang-keluar/update/{id}', 'App\Http\Controllers\BarangKeluarController@update');
// Route::get('/barang-keluar/hapus/{id}', 'App\Http\Controllers\BarangKeluarController@delete');
Route::get('/barang-keluar/store/gagal', 'App\Http\Controllers\BarangKeluarController@gagal');
Route::get('/barang-keluar/store/gagal2/{id}', 'App\Http\Controllers\BarangKeluarController@gagal2');

// Route::get('/retur', 'App\Http\Controllers\ReturController@index');
// Route::get('/retur/tambah', 'App\Http\Controllers\ReturController@tambah');
// Route::post('/retur/store', 'App\Http\Controllers\ReturController@store');
// Route::get('/retur/edit/{id}', 'App\Http\Controllers\ReturController@edit');
// Route::put('/retur/update/{id}', 'App\Http\Controllers\ReturController@update');
// Route::get('/retur/hapus/{id}', 'App\Http\Controllers\ReturController@delete');
Route::get('/retur/store/gagal', 'App\Http\Controllers\ReturController@gagal');
Route::get('/retur/store/gagal2/{id}', 'App\Http\Controllers\ReturController@gagal2');
Route::get('/retur/store/gagal3', 'App\Http\Controllers\ReturController@gagal3');
Route::get('/retur/store/gagal4', 'App\Http\Controllers\ReturController@gagal4');
Route::get('/retur/store/gagal5/{id}', 'App\Http\Controllers\ReturController@gagal5');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
