<?php

//주석 라우트
Route::get('/', function () {
    return view('welcome', [
        'name' => 'BAMMM',
        'greeting' => '안녕하십니까?'
    ]);
});

//조건식 라우트
Route::get('/', function () {
    $items = ['a', 'b', 'c'];

    return view('welcome', [
        'items' => $items
    ]);
});

//반복문 라우트
Route::get('/', function () {
    $items = ['a', 'b', 'c'];

    return view('welcome', [
        'items' => $items
    ]);
});

//템플릿 상속 라우트
Route::get('/', function() {
    return view('welcome');
});