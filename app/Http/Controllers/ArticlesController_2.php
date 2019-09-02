<?php


namespace App\Http\Controllers;

use \App\Article;

//즉시로드와 페이징 study controller
class ArticlesController_2 extends Controller
{
    public function index() {
        //일반 로드
//        $articles = Article::get();

        //즉시 로드
        //N+1 쿼리 문제를 해결하기 위해 다음과 같이 모델 쿼리 시작 부분에 with() 메서드를 체인
        //with() 메서드는 인자로 받은 관계를 미리 로드한다.
        //위에 사용한 것과 다르게 화면에 보이는 쿼리가 줄은걸 볼 수 있다. 이것을 즉시 로드(eager load) 라고한다.
        //즉시 로드 사용시 주의 : with() 메서드는 항상 엘로퀀트 모델 바로 다음에 위치, with() 메서드 인자는 테이블 이름이 아니고 모델에서 관계를 표현하는 메서드의 이름이다
//        $articles = Article::with('user')->get();

        //지연 로드
        //엘로퀀트 쿼리할 때 관계가 필요 없어서 즉시 로드하지 않고 나중에 필요할 때 관계를 로드해야 할 때가 있다. 이를 지연 로드(lazy load) 라고하고, load() 메서드를 사용
//        $articles = Article::get();

        //user() 관계가 필요 없는 다른 로직 수행

//        $articles->load('user');

        //페이징
        //위에서 사용하던 get() 을 paginate() 로 바꾸면 끝
        $articles = Article::latest()->paginate(3); //latest() 쿼리 결과를 날짜 역순으로 정렬 = orderBy('created_at', 'desc') 와 같다

        return view('articles.index', compact('articles'));
    }
}