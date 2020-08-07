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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('ptgaruda.home');
// });
// Route::get('/', function () {
//     return view('tokoBaju.home');
// });


// Materi 1
Route::resource('Karyawans', 'KaryawanController');
// mau di relasiin ke materi karyawan
Route::get('/', 'BagianController@index')->middleware('auth');
Route::resource('bagians', 'BagianController')->middleware('auth');
Route::get('/bagians/{bagian}', 'BagianController@show')->name('bagians.show')->middleware('auth')->middleware('can:view,bagian');


    // Route upload gambar
Route::get('/file-upload', 'FileUploadController@fileUpload');
Route::post('/file-upload', 'FileUploadController@prosesFileUpload');

Route::get('/file-upload-rename', 'FileUploadController@fileUploadRename');
Route::post('/file-upload-rename', 'FileUploadController@prosesFileUploadRename');

Route::resource('gallery', 'GalleryController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// materi middleware
// Route::get('/daftar-karyawan', 'DataController@daftarKaryawan');
// Route::get('/tabel-karyawan', 'DataController@tabelKaryawan');
// Route::get('/blog-karyawan', 'DataController@blogKaryawan');

// Materi Session
// Route::get('/session', 'SessionController@index');
// Route::get('/buat-session', 'SessionController@buatSession');
// Route::get('/akses-session', 'SessionController@aksesSession');
// Route::get('/hapus-session', 'SessionController@hapusSession');
// Route::get('/flash-session', 'SessionController@flashSession');

// -----
// Route::get('/login', 'LoginController@login');
// Route::post('/login', 'LoginController@prosesLogin');
// Route::get('/logout', 'LoginController@logout');
// Route::redirect('/', '/login');
// Route::get('/daftar-karyawan', 'LoginController@daftarkaryawan')->middleware('login');
// Route::get('/tabel-karyawan', 'LoginController@tabelkaryawan')->middleware('login');
// Route::get('/blog-karyawan', 'LoginController@blogkaryawan')->middleware('login');

//---------------------------TUGAS-----------------------------------------------------
// Tugas 1
Route::group(['prefix' => 'indomarets'], function () {
    Route::get('/', 'IndomaretController@index')->name('indomarets.index');
    Route::get('/create', 'IndomaretController@create')->name('indomarets.create');
    Route::post('/', 'IndomaretController@store')->name('indomarets.store');
    Route::get('/{indomaret}', 'IndomaretController@show')->name('indomarets.show');
    Route::get('/{indomaret}/edit', 'IndomaretController@edit')->name('indomarets.edit');
    Route::patch('/{indomaret}', 'IndomaretController@update')->name('indomarets.update');
    Route::delete('/{indomaret}', 'IndomaretController@destroy')->name('indomarets.destroy');
});
// Route::resource('indomarets', 'IndomaretController');

    // Tugas 2 PT. Garuda Divisi IT & Marketing
// Route::get('/its', 'ItController@index')->name('its.index');
// Route::get('/its/create', 'ItController@create')->name('its.create');
// Route::post('/its', 'ItController@store')->name('its.store');
// Route::get('/its/{it}', 'ItController@show')->name('its.show');
// Route::get('/its/{it}/edit', 'ItController@edit')->name('its.edit');
// Route::patch('/its/{it}', 'ItController@update')->name('its.update');
// Route::delete('/its/{it}', 'ItController@destroy')->name('its.destroy');
Route::resource('its', 'ItController');
    // Divisi Marketing
Route::group(['prefix' => 'marketings'], function () {
    Route::get('/', 'MarketingController@index')->name('marketings.index');
    Route::get('/create', 'MarketingController@create')->name('marketings.create');
    Route::post('/', 'MarketingController@store')->name('marketings.store');
    Route::get('/{marketing}', 'MarketingController@show')->name('marketings.show');
    Route::get('/{marketing}/edit', 'MarketingController@edit')->name('marketings.edit');
    Route::patch('/{marketing}', 'MarketingController@update')->name('marketings.update');
    Route::delete('/{marketing}', 'MarketingController@destroy')->name('marketings.destroy');
});

// Tugas 3
Route::resource('ktp', 'KtpController');

// Tugas 4
Route::resource('tokoBaju', 'TokoBajuController');

