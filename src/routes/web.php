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
use App\Http\Controllers;


// 管理画面のview表示
Route::get('/system', 'HomeController@index')->name('home');

// アンケートトップページのview表示
Route::get('/', 'FrontController@index');

// アンケート情報を確認画面に送信
Route::post('/confirm', 'FrontController@confirm');

// 詳細ページ
Route::get('/system/{show}', 'HomeController@show');

// 確認画面から保存して完了ページにリダイレクト
Route::post('/complete', 'FrontController@save');

// 詳細ページから削除
Route::post('/system/delete/{id}', 'HomeController@delete');

Auth::routes();
