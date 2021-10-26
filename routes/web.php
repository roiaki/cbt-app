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

// 出来事に関して
Route::get('events', 'EventsController@index')->name('events');
Route::get('events/create', 'EventsController@create')->name('events.create');
Route::post('events', 'EventsController@store')->name('events.store');
Route::get('events/{event}', 'EventsController@show')->name('events.show');
Route::get('events/{event}/edit', 'EventsController@edit')->name('events.edit');
Route::post('events/{event}/delete}','EventsController@destroy')->name('events.destroy');
Route::put('events/{event}', 'EventsController@update')->name('events.update');


// 3コラムに関して
Route::get('three_columns', 'ThreeColumnsController@index')->name('three_columns');
Route::get('three_columns/create/{id}', 'ThreeColumnsController@create')->name('three_columns.create');
Route::post('three_columns', 'ThreeColumnsController@store')->name('three_columns.store');
Route::get('three_columns/{param}', 'ThreeColumnsController@show')->name('three_columns.show');
Route::get('three_columns/{param}/edit', 'ThreeColumnsController@edit')->name('three_columns.edit');
Route::post('three_columns/{param}','ThreeColumnsController@destroy')->name('three_columns.destroy');
Route::put('three_columns/{param}', 'ThreeColumnsController@update')->name('three_columns.update');


// 7コラムに関して
Route::get('seven_columns', 'SevenColumnsController@index')->name('seven_columns');
Route::get('seven_columns/create/{id}', 'SevenColumnsController@create')->name('seven_columns.create');
Route::post('seven_columns/store', 'SevenColumnsController@store')->name('seven_columns.store');
Route::get('seven_columns/{param}', 'SevenColumnsController@show')->name('seven_columns.show');
Route::get('seven_columns/{param}/edit', 'SevenColumnsController@edit')->name('seven_columns.edit');
Route::post('seven_columns/{param}', 'SevenColumnsController@destroy')->name('seven_columns.destroy');
Route::put('seven_columns/{param}', 'SevenColumnsController@update')->name('seven_columns.update');

// 使い方説明
Route::get('users/info', 'ThreeColumnsController@info')->name('users.info');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');

// ログアウト
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザー退会確認画面遷移
Route::get('users/delete_confirm', 'UserController@delete_confirm')->name('users.delete_confirm');

// ユーザー退会処理 問題あり
Route::delete('users/delete', 'UserController@userDelete')->name('user.delete');


// ログイン認証付きのルーティング
Route::group(['middleware' => ['auth']], function () {
/*
    Route::resource(
        'columns',
        'ColumnsController',
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
        'UsersController',
        ['only' => [
            'delete'
        ]]
    );
});
