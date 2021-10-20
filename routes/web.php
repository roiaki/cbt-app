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

Route::get('/', function () {
    return view('welcome');
});

// ここから
Route::get('events', 'App\Http\controllers\EventsController@index')->name('events');
Route::get('events/create', 'App\Http\controllers\EventsController@create')->name('events.create');
Route::post('events', 'App\Http\controllers\EventsController@store')->name('events.store');
Route::get('events/{event}', 'App\Http\controllers\EventsController@show')->name('events.show');
Route::get('events/{event}/edit', 'App\Http\controllers\EventsController@edit')->name('events.edit');
Route::delete('events/{event/delete}','App\Http\controllers\EventsController@destroy')->name('events.destroy');

Route::put('events/{event}', 'App\Http\controllers\EventsController@update')->name('events.update');


// 3コラムに関して
Route::get('three_columns', 'App\Http\Controllers\ThreeColumnsController@index')->name('three_columns');
Route::get('three_columns/create/{id}', 'App\Http\Controllers\ThreeColumnsController@create')->name('three_columns.create');
Route::post('three_columns', 'App\Http\controllers\ThreeColumnsController@store')->name('three_columns.store');

Route::get('three_columns/{param}', 'App\Http\Controllers\ThreeColumnsController@show')->name('three_columns.show');
Route::get('three_columns/{param}/edit', 'App\Http\controllers\ThreeColumnsController@edit')->name('three_columns.edit');
Route::delete('three_columns/{param}','App\Http\controllers\ThreeColumnsController@destroy')->name('three_columns.destroy');

Route::put('three_columns/{param}', 'App\Http\controllers\ThreeColumnsController@update')->name('three_columns.update');


// 7コラムに関して
Route::get('seven_columns', 'App\Http\Controllers\SevenColumnsController@index')->name('seven_columns');
Route::get('seven_columns/create/{id}', 'App\Http\Controllers\SevenColumnsController@create')->name('seven_columns.create');

Route::post('seven_columns/store', 'App\Http\Controllers\SevenColumnsController@store')->name('seven_columns.store');

Route::get('seven_columns/{id}', 'App\Http\Controllers\SevenColumnsController@show')->name('seven_columns.show');
Route::get('seven_columns/{id}/edit', 'App\Http\Controllers\SevenColumnsController@edit')->name('seven_columns.edit');
Route::delete('seven_columns/{id}', 'App\Http\Controllers\SevenColumnsController@destroy')->name('seven_columns.destroy');
Route::put('seven_columns/{param}', 'App\Http\controllers\SevenColumnsController@update')->name('seven_columns.update');


Route::get('users/info', 'App\Http\Controllers\ThreeColumnsController@info')->name('users.info');

// ユーザ登録
Route::get('signup', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'App\Http\Controllers\Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.post');
// ログアウト
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout.get');

// ユーザー退会確認画面遷移
Route::get('users/delete_confirm', 'App\Http\Controllers\UserController@delete_confirm')->name('users.delete_confirm');

// ユーザー退会処理 問題あり
Route::delete('users/delete', 'App\Http\Controllers\UserController@userDelete')->name('user.delete');


// ログイン認証付きのルーティング
Route::group(['middleware' => ['auth']], function () {
/*
    Route::resource(
        'columns',
        'App\Http\Controllers\ColumnsController',
        ['only' => [
            'index',
            'create',
            'edit',
            'show',
            'store',
            'update',
            'destroy'
        ]]
    );
*/
    Route::resource(
        'users',
        'App\Http\Controllers\UsersController',
        ['only' => [
            'delete'
        ]]
    );
});
