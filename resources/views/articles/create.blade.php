@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>새 포럼 글쓰기</h1>

        <hr/>

        <form action="{{route('articles.store')}}" method="POST">
            {{-- CSRF 공격을 막기위헤 _token 키를 가진 숨은 필드를 만드는 도우미 함수 --}}
            {!! csrf_field() !!}

            {{-- has('title') : title 키에 해당하는 유효성 검사 오류가 있는지 확인한다.
                 있으면 has-errors를 출력한다, has-error는 오류를 시각적으로 표시하기 위한 트위터 부트스트랩 클래스--}}
            <div class="form-group" {{$errors->has('title') ? 'has-error' : ''}}>
                <label for="title">제목</label>
                {{-- old('title') : 유효성 검사에 실패해서 이 페이지로 다시 돌아올 경우, 사용자가 입력했던값을 유지하기 위한 도우미 함수(비밀번호는 제외)
                     세션에 인자로 넘긴 키가 없으면 null을 반환, 사용자의 이전 입력값은 세션에 저장되어 있다--}}
                <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control"/>
                {{-- $errors->first('title', '<span class="form-error">:message</span>') :$errors 변수는 @if(isset($errors)) 체크 없이 뷰에서 항상 안전하게 쓸 수 있다.
                     유효성 검사 오류가 발생하면 컨트롤러는 lluminate\Support\MessageBag 인스턴스를 만들어 이 변수에 담아 놓기 때문에 뷰에서 꺼내 쓸 수 있다.
                     이 인스턴스에 있는 first($key, $format) 메서드는 $key에 할당된 메시지 중 첫 번째를 $format 서식에 맞추어 반환한다.--}}
                {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group" {{$errors->has('content') ? 'has-error' : ''}}>
                <label for="content">본문</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{old('content')}}</textarea>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    저장하기
                </button>
            </div>
        </form>
    </div>
@stop
