<?php

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

Route::get('/','Anasehifecontroller@index')->name('anasehife');
Route::get('/kategori/{slug_kategoriadi}', 'Kategoricontroller@index')->name('kategori');
Route::get('/urun/{slug_urunadi}', 'Uruncontroller@index')->name('urun');
Route::get('/sepet','Sepetcontroller@index')->name('sepet');
Route::get('/odeme','Odemecontroller@index')->name('odeme');
Route::get('/sifarisler','Sifarislercontroller@index')->name('sifarisler');
Route::get('/sifarisler/{id}','Sifarislercontroller@detay')->name('sifaris');
Route::group(['prefix'=>'kullanici'],function(){
Route::get('/oturumac','Kullanicicontroller@giris_form')->name('kullanici.oturumac');
Route::get('/kaydol','Kullanicicontroller@kaydol_form')->name('kullanici.kaydol');
});


?>