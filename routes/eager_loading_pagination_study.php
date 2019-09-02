<?php

Auth::routes();

Route::resource('articles', 'ArticlesController_2');

//DB::listen((function($query) {
////    var_dump($query->sql);
//    dump($query->sql);
//}));