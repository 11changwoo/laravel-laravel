<?php

//파라미터 필수
Route::get('/{foo}', function($foo = 'bar') {
    return $foo;
});


//파라미터 정규식 패턴
Route::pattern('foo', '[0-9a-zA-Z]{3}');

Route::get('/{foo?}', function($foo = 'bar') {
    return $foo;
});


//파라미터 정규식 패턴 2
Route::get('/{foo?}', function($foo = 'bar') {
    return $foo;
})->where('foo', '[0-9a-zA-Z]{3}');


//route 이름 설정하여 사용
Route::get('/', ['as' => 'home', function() {
    return '제 이름은 "home" 입니다.';
}]);

Route::get('/home', function() {
    return redirect(route('home'));
});