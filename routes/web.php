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

//주석 라우트
Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/login', ['as' => 'login', function() {
   return view('login');
}]);