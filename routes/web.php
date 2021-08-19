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

Route::resource('user','UserController')->middleware('auth');
Route::get('user/{id}/show','UserController@sh')->middleware('auth');

Route::post('payform/virtualWallet', 'FormPayController@wallet')->middleware('auth')->name('wallet.store');  //Método para inscribir wallet
Route::resource('payform', 'FormPayController')->middleware('auth');



Route::get('refers', 'RefersController@index')->middleware('auth')->name('contract.index');
Route::get('refers/contract/range/{id}', 'RefersController@detailcontract')->middleware('auth')->name('contract.resume');  //Ver detalle de cada contrato
Route::get('refers/details/{id}', 'RefersController@detail')->middleware('auth')->name('contract.detail');  //Ver detalle del contrato n (ver referidos)
Route::get('movements', 'MovementsController@index')->middleware('auth')->name('movement');
Route::get('pay', 'PaysController@index')->middleware('auth')->name('pay');

Route::get('profitability', 'ProfitabilityController@index')->middleware('auth')->name('profitability.index');

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
Route::get('admin/inactiveusers/update/status/{id}', 'Admin\RefersController@active')->middleware('isAdmin');
Route::put('admin/inactiveactive/update', 'Admin\RefersController@status')->middleware('isAdmin');
Route::get('admin/pays/user/{id}', 'Admin\PaysController@show')->middleware('isAdmin');
Route::get('admin/users/structures/{id}', 'Admin\UsersController@structures')->middleware('isAdmin');

//--------------------- OCR CLOUD API --------------

Route::get('/pays', 'PaysController@displayForm');
Route::post('/pays', 'PaysController@annotateImage');


Route::get('/register/{referralCode}', 'RefersController@link')->name('referral.link');


//--------------------- Bitcoin Cash pay successfull--------------
Route::get('/paybtc/{userid}/{tree}', 'PaysController@bitpay')->name('bitstore');

//---------------------Bitcoin Cash -------------------//
Route::post('/paybch/generate/', 'BitcoinCashController@show')->middleware('auth')->name('bch.show');
