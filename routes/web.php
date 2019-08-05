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

Route::redirect('/', '/login');

//Route::get('/{str?}', function($str = 'login') {
//   return redirect(route('login'));
//});

Route::get('/login', [
    'as' => 'login',
    function() {
        return view('login');
    }
]);

