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

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin//

Route::post('/add/user', 'HomeController@addUser')->name('add_user');
Route::get('/delete/user/{id}', 'HomeController@deleteUser')->name('delete_user');


Route::get('/admin/accounts/{id}', 'AccountsController@adminGetAccounts')->name('admin_accounts');

Route::post('/admin/{user}/account/add', 'AccountsController@adminAddAccount')->name('admin_add_account');

Route::get('/admin/{id}/account/edit', 'AccountsController@adminShowEditAccount')->name('show_edit_admin_account');

Route::post('/admin/{id}/account/save', 'AccountsController@adminEditAccount')->name('admin_edit_account');

Route::get('/admin/{id}/account/delete', 'AccountsController@adminDeleteAccount')->name('admin_delete_account');


Route::get('/tokens', 'TokenController@getTokens')->name('tokens');

Route::post('/token/add', 'TokenController@addToken')->name('add_token');

Route::get('/token/edit/{id}', 'TokenController@showEditToken')->name('show_edit_token');

Route::post('/token/edit/save/{id}', 'TokenController@editToken')->name('edit_token');

Route::get('/token/delete/{id}', 'TokenController@deleteToken')->name('delete_token');

//User//

Route::get('/accounts', 'AccountsController@getAccounts')->name('get_accounts');

Route::post('/account/add', 'AccountsController@addAccount')->name('add_account');

Route::get('/account/edit/{id}', 'AccountsController@showEditAccount')->name('edit_show_account');

Route::post('/account/{id}/save', 'AccountsController@editAccount')->name('edit_account');

Route::get('/account/delete/{id}', 'AccountsController@deleteAccount')->name('delete_account');

