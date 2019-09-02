<?php
//웹을 위한 라우트
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

Auth::routes();

Route::resource('articles', 'ArticlesController_2');

//DB::listen((function($query) {
////    var_dump($query->sql);
//    dump($query->sql);
//}));