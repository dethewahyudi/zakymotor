<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'module@login')->name('login');
Route::get('/home', 'module@home')->name('home');
Route::get('/transaksjual', 'module@transaksipenjualan')->name('tpenjualan');
Route::get('/transaksbeli', 'module@transaksipembelian')->name('tpembelian');
Route::get('/transaksbayar', 'module@transaksipembayaran')->name('tpembayaran');
Route::get('/reportbeli', 'module@reportpembelian')->name('rpembelian');
Route::get('/reportjual', 'module@reportpenjualan')->name('rpenjualan');
Route::get('/reporthutang', 'module@reporthutangpiutang')->name('rhutang');
// Route::get('/reportmaster', 'module@reportmaster')->name('rmaster');
// Route::get('/reportuser', 'module@reportuser')->name('ruser');
Route::get('/masterbarang', 'module@masterbarang')->name('mbarang');
Route::get('/masterstok', 'module@masterstok')->name('mstok');
Route::get('/masteruser', 'module@masteruser')->name('muser');

Route::get('/prodmast', 'module@prodmast');
Route::get('/masterprodmast', 'module@masterprodmast');
Route::get('/masterprodmastdetail/{id1}', 'module@masterprodmastdetail');
Route::get('/masterprodmastdetail2/{id1}/{id2}', 'module@masterprodmastdetail2');
Route::get('/masterprodmastexport/{id1}', 'module@masterprodmastexport');

Route::get('/mastertransaksibeli', 'module@mastertransaksibeli');
Route::get('/mastertransaksijual', 'module@mastertransaksijual');

Route::get('/mastertransaksibayar', 'module@mastertransaksibayar');
Route::post('/insertpembayaran', 'module@insertpembayaran');



Route::get('/logincek/{id1}/{id2}', 'module@logincek');
Route::get('/loginsession/{id1}/{id2}', 'module@loginsession');
Route::get('/prdcd', 'module@prdcd');

Route::post('/insertpembelian', 'module@insertpembelian');
Route::post('/insertpenjualan', 'module@insertpenjualan');
Route::post('/updatemaster', 'module@updatemaster');

Route::post('/usertambah', 'module@usertambah');
Route::get('/useredit/{id1}/{id2}/{id3}', 'module@useredit');
Route::get('/prodmastjual', 'module@prodmastjual');

Route::get('/masterbeli', 'module@masterbeli');
Route::get('/masterbelireport', 'module@masterbelireport');
Route::get('/masterbelitgl/{id1}/{id2}', 'module@masterbelitgl');
Route::get('/masterbelistream', 'module@masterbelistream')->name('streambeli');
Route::get('/masterbeliexcel', 'module@masterbeliexcel')->name('excelbeli');

Route::get('/masterjualstream', 'module@masterjualstream')->name('streamjual');
Route::get('/masterjualexcel', 'module@masterjualexcel')->name('exceljual');

Route::get('/tampiluser', 'module@tampiluser');
Route::get('/masterhutangreport', 'module@masterhutangreport');

Route::get('/masterhutangstream/{id1}', 'module@masterhutangstream');
Route::get('/masterpiutangstream/{id1}', 'module@masterpiutangstream');

Route::get('/streambayar/{id1}/{id2}', 'module@streambayar');
Route::get('/statistikbeli/{id1}/{id2}/{id3}', 'module@statistikbeli');


