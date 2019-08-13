<?php
//웹을 위한 라우트

Route::get('/', 'WelcomeController@index');

Route::resource('articles', 'ArticlesController');

Route::post('경로 uri', '작업이 이루어질 Controller 이름');
Route::put('경로 uri', '작업이 이루어질 Controller 이름');
Route::patch('경로 uri', '작업이 이루어질 Controller 이름');
Route::delete('경로 uri', '작업이 이루어질 Controller 이름');
Route::options('경로 uri', '작업이 이루어질 Controller 이름');
Route::match("['GET', 'POST'] 를 첫 번째 인자로 썻다면, GET 또는 POST 메서드를 이용한 요청을 다 받는다", '경로 uri', '작업이 이루어질 Controller 이름');
Route::any('경로 uri(HTTP 메서드를 구분하지 않고 경로만으로 라우팅한다)', '작업이 이루어질 Controller 이름');