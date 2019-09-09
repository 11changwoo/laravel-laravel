<?php


namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
//유효성 검사
class ArticlesController_3 extends Controller
{
    public function store(Request $request) {

        /*
         * 유효성 검사 규칙
         * '필드' => '조건' 과 같이 키-값 쌍으로 표현
         * 중첩 배열 대신 'content' => 'required|min:10' 처럼 파이프( | ) 사용 가능
         * title 필수, content 필수이면서 최소 10글자 이상 이라는 조건
         * */
        $rules = [
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];

        $messages = [
          'title.required' => '제목은 필수 입력 항목입니다.',
          'content.required' => '본문은 필수 입력 항목입니다.',
          'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.'
        ];

        /*
         * make() 메서드의 첫 번째 인자는 검사의 대상이 되는 폼 데이터, 두 번째는 검사규칙, 세 번째는 사용자 정의 오류 메시지를 지정한다.
         * */
        $validator = \Validator::make($request->all(), $rules, $messages);

        /*
         * 유효성을 검사
         * fails()와 passes() 메서드를 사용할 수 있다. 둘다 부울(true/false)을 반환하는데, fails()는 유효성 검사를 통과하지 못하면 true 반환
         * */
        if ($validator->fails()) {
            /*
             * back() : 이전 페이지로 리디렉션하는 도우미 함수 (=redirect(route('articles.create')))
             * withErrors() : 유효성 검사기 인스턴스를 인자로 받아 검사 실패 이유를 세션에다 굽는 일을 한다. 뷰에서 본 $errors 변수는 이 메서드가 넘긴 것
             * withInput() : 폼 데이터를 세션에다가 굽는 일을 한다. 뷰의 old() 함수는 이 메서드가 구운 값을 읽는다.
             * */
            return back()->withErrors($validator)->withInput();
        }

        /*
         * 실전에서는 auth()->user()->articles()->... 와 같이 현재 로그인한 사용자 인스턴스를 이용
         * request->all()은 사용자가 요청한 쿼리 스트링 또는 폼 데이터 전체를 연관배열로 반환
         * */
        $article = \App\User::find(1)->articles()->create($request->all());

        if (!$article) {
            /*
             * with()메서드는 인자로 받은 키-값 쌍을 세션에 저장
             * */
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        /*
         * redirect() 페이지 이동을 시킨다.
         * */
        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    public function create() {
        return view('articles.create');
    }

    public function index() {
        $articles = Article::latest()->paginate(3);

        return view('articles.index', compact('articles'));
    }
}