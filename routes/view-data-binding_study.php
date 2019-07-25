<?php
/*
 * 하위 디렉터리에 있는 뷰 파일은 (.)으로 참조 가능 (/도 가능)
 * 뷰 파일은 파일이름.blade.php 와 같은 모양 (.php도 가능)
*/

//데이터 바인딩 with(키, 값)
Route::get('/', function () {
    return view('welcome')->with('name', 'Foo');
});


//데이터 여러개 바인딩
Route::get('/', function() {
    return view('welcome')->with([
        'name' => 'Foo',
        'greeting' => '안녕하세요?'
    ]);
});

//view()함수 이용 방법
Route::get('/', function() {
    return view('welcome', [
        'name' => 'Foo',
        'greeting' => '안녕하세요?'
    ]);
});

/*
 * 연습시 이용한 뷰 welcome 은
 * /resources/views/welcome.blade.php 와 같이 위치한 welcome 파일
 * 그리고 welcome 파일의 html
 *
 * <h1><?= isset($greeting)? "{$greeting}" : 'Hello';?> <?= $name; ?></h1>
 * */