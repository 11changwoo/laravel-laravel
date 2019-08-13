<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    //CSRF 공격 방어 기능을 끄는 용도
    //CSRF 보호에서 제외할 URL 패턴을 써주면 된다.
    //밑에 주석은 연습시 테스트용으로 해당 url의 CSRF 기능을 잠시 비활성화 시키기 위함
    protected $except = [
        //
//        'articles',
//        'articles/*'
    ];
}
