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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/prospects', 'ProspectController@index')->name('allProspects');
Route::get('/cambridgeform/{slug}', 'ProspectController@ShowFirstUniversity')->name('firstUni');
Route::get('/yaleform/{slug}', 'ProspectController@ShowSecondUniversity')->name('secondUni');
Route::put('/updateyale/{id}', 'ProspectController@UpdateSecondUni')->name('yaleupdate')->where('id', '\d+');
Route::put('/updatecambridge/{id}', 'ProspectController@UpdateFirstUni')->name('cambridgeupdate')->where('id', '\d+');
Route::get('/create', 'ProspectController@create')->name('createProspect');
Route::post('/create', 'ProspectController@store')->name('saveProspect');
Route::get('/profile/{slug}', 'ProspectController@ViewProspect')->name('prospect');
Route::get('/delete/{slug}', 'ProspectController@DeleteProspect')->name('deleteprospect');
Route::get('/update/{slug}', 'ProspectController@ShowProspect')->name('showprospect');
Route::put('/update/{slug}', 'ProspectController@UpdateProspect')->name('updateprospect');
Route::get('/offer-conditional-admission/{slug}', 'ProspectController@ShowOffer')->name('showoffer');
Route::PUT('/conditional-offer/{slug}', 'ProspectController@ConditionalOffer')->name('conditionaloffer');
