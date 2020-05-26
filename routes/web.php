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
Route::get('/', 'HomeGetController@get_index');
Route::get('/index', 'HomeGetController@get_index_yönlerdir');
Route::get('/home', 'HomeGetController@get_index_yönlerdir');
Route::get('/anasayfa', 'HomeGetController@get_index_yönlerdir');
Route::get('/giris-yap', 'HomeGetController@get_giris_yap');
Route::get('/cikis-yap', 'HomeGetController@get_cikis_yap');
Route::get('/iletisim', 'HomeGetController@get_iletisim');
Route::get('/hakkimizda', 'HomeGetController@get_hakkimizda');
Route::get('/blog', 'HomeGetController@get_blog');
Route::get('/blog/yazar/{yazar}', 'HomeGetController@get_blog_yazar');
Route::get('/blog/{slug}', 'HomeGetController@get_blog_icerik')->where('slug', '^[a-zA-Z0-9-_\/]+$');
Route::post('/blog/{slug}', 'HomePostController@post_blog_yorum')->where('slug', '^[a-zA-Z0-9-_\/]+$');
Route::post('/locale', 'HomePostController@post_locale');

Route::group(['prefix' => 'forum'], function () {
    Route::get('/', 'HomeGetController@get_forum');
    Route::get('/konu-ekle', 'HomeGetController@get_forum_ekle');//her zaman fonk un üstüne yaz
    Route::post('/konu-ekle', 'HomePostController@post_forum_ekle');//her zaman fonk un üstüne yaz
    Route::get('/{slug}', 'HomeGetController@get_forum_liste');
    Route::get('{ana_konu}/{slug}', 'HomeGetController@get_forum_detay');
    Route::post('{ana_konu}/{slug}', 'HomePostController@post_forum_detay');
    Route::post('/konu-sil', 'HomePostController@post_konu_sil');

});
Route::group(['prefix' => 'admin', 'middleware' => 'Admin','guest'], function () {
    Route::get('/', 'AdminGetController@get_index');
    Route::get('/ayarlar', 'AdminGetController@get_ayarlar');
    Route::post('/ayarlar', 'AdminPostController@post_ayarlar');
    Route::get('/hakkimizda', 'AdminGetController@get_hakkimizda');
    Route::post('/hakkimizda', 'AdminPostController@post_hakkimizda');


    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'AdminGetController@get_blog');
        Route::post('/', 'AdminPostController@post_blog_sil');
        Route::get('/blog-ekle', 'AdminGetController@get_blog_ekle');
        Route::post('/blog-ekle', 'AdminPostController@post_blog_ekle');
        Route::get('/blog-duzenle/{slug}', 'AdminGetController@get_blog_duzenle');
        Route::post('/blog-duzenle/{slug}', 'AdminPostController@post_blog_duzenle');
        Route::get('/kategori-ekle', 'AdminGetController@get_kategori_ekle');
        Route::post('/kategori-ekle', 'AdminPostController@post_kategori_ekle');
        Route::get('/kategori', 'AdminGetController@get_kategoriler');
        Route::post('/kategori', 'AdminPostController@post_kategori_sil');
    });
    Route::group(['prefix' => 'forum'], function () {
        Route::get('/', 'AdminGetController@get_ana_basliklar');
        Route::get('/ana-baslik-ekle', 'AdminGetController@get_anabaslik_ekle');
        Route::post('/ana-baslik-ekle', 'AdminPostController@post_anabaslik_ekle');
    });
});

Auth::routes();
