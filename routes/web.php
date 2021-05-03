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

 ---------------- RUTAS USUARIO -------------------
|
*/

Route::get('commissions/create','CommissionsController@create')->middleware('auth')->name('commissionsGenerate');
Route::get('commissions/{id}','CommissionsController@show')->middleware('auth')->name('commissionsShow');
Route::get('commissions','CommissionsController@store')->middleware('auth')->name('commissionsStore');

Route::get('investments/{id}','InvestmentsController@show')->middleware('auth')->name('investments');

Route::get('refers/create','RefersController@create')->middleware('auth')->name('refersCreate');
Route::post('refers','RefersController@store')->middleware('auth')->name('refersStore');

Route::get('refers/{id}','RefersController@show')->middleware('auth')->name('refersShow');
Route::get('status/{id}','StatusController@show')->middleware('auth')->name('statusRefresh');

;
Route::resource('user','UserController')->middleware('auth');
Route::get('user/{id}/show','UserController@sh')->middleware('auth');

Route::resource('payform', 'FormPayController')->middleware('auth');

Route::resource('payment/method/efecty', 'EfectyController')->middleware('auth');  //Controlador para el método de pago Efecty

Route::get('refers', 'RefersController@index')->middleware('auth')->name('tree');
Route::get('refers/details/{id}', 'RefersController@detail')->middleware('auth')->name('tree.detail');  //Ver detalle de estructura n
Route::get('movements', 'MovementsController@index')->middleware('auth')->name('movement');
Route::get('pay', 'PaysController@index')->middleware('auth')->name('pay');
Route::redirect('/', '/login', 301);

Auth::routes();



// ---------------------------------RUTAS ADMIN -------------------//



Route::resource('admin/users', 'Admin\UsersController')->middleware('isAdmin');
Route::resource('admin/investments', 'Admin\InvestmentsController')->middleware('isAdmin');
Route::resource('admin/commissions', 'Admin\CommissionsController')->middleware('isAdmin');
Route::resource('admin/refers', 'Admin\RefersController')->middleware('isAdmin');
Route::resource('admin/status', 'Admin\StatusController')->middleware('isAdmin');
Route::resource('admin/pays', 'Admin\PaysController')->middleware('isAdmin');
Route::resource('admin/alerts', 'Admin\AlertsController')->middleware('isAdmin');
Route::resource('admin/alertspays', 'Admin\AlertsPaysController')->middleware('isAdmin');
Route::get('admin/refresh', 'Admin\UsersController@upgrade')->middleware('isAdmin');
Route::get('admin/tree', 'Admin\TreeController@show')->middleware('isAdmin');
Route::resource('admin/payscompleted', 'Admin\PaysCompletedController')->middleware('isAdmin');
Route::get('admin/export', 'Admin\AlertsPaysController@export')->middleware('isAdmin');

Route::get('admin/inactiveusers','Admin\StatusController@inactive')->middleware('isAdmin');
Route::get('admin/activeusers','Admin\StatusController@active')->middleware('isAdmin');


//--------------------- OCR CLOUD API --------------

Route::get('/pays', 'PaysController@displayForm');
Route::post('/pays', 'PaysController@annotateImage');


Route::get('/register/{referralCode}', 'RefersController@link')->name('referral.link');


//--------------------- Bitcoin --------------
Route::get('/paybtc/{userid}', 'PaysController@bitpay')->name('bitstore');
