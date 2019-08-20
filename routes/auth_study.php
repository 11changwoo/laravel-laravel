<?php

Route::get('/', 'WelcomeController@index');

Route::get('auth/login', function() {
    //로그인에 필요한 정보를 하드코드로 담은 변수
    $credentials = [
        'email' => 'john@example.com',
        'password' => 'password'
//     'password' => 'secret'
    ];

    //auth()는 도우미 함수
    //사용자 인증할 때 attempt(array $credentials = [], bool $remember = false) 메서드 사용
    //두 번째 인자에 true 를 주면, 마이그레이션에서 봤던 remember_token 열과 같이 동작해서 사용자 로그인을 기억할 수 있다.
    //auth() 대신 Auth::attempt()와 같이 파사드를 이용할 수 있다.
    //attempt() 메서드는 넘겨받은 변수의 정보를 DB 에서 조회하고 정확히 일치하는 사용자가 있는지 확인한다.
    if (!auth()->attempt($credentials)) {
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

Route::get('protected', function() {
   //세션에 저장된 값을 덤프하는 코
   dump(session()->all());

   //check 메서드는 URL 을 요청한 브라우저가 로그인 상태면 true 반환
   //user() 메서드는 로그인한 사용자의 클래스 인스턴스를 반환
   //이 부분이 없다면, Trying to get property 'name' of non-object 에러가 발생한다.
   //if 문을 사용하지 않고 안전하게 다른 위치로 이동시킬 수 있는 방법이 auth 미들웨어
   if (!auth()->check()) {
       return '누구세요?';
   }

   return '어서오세요' . auth()->user()->name;
});

//위에 주석이 아래의 라우트로 대체할 수 있다.
Route::get('protected',['middleware' => 'auth', function() {
    dump(session()->all());

    return '어서오세요' . auth()->user()->name;
}]);

Route::get('auth/logout', function() {
    //logout() 메서드를 이용
    //로그아웃하면 세션을 폐기한다.
    auth()->logout();

    return '또 봐요~';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');