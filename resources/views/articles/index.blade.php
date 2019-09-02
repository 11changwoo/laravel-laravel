@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>포럼 글 목록</h1>
        <hr/>
        <ul>
            @forelse($articles as $article)
                <li>
                    {{$article->title}}
                    <small>
                        {{-- N+1 쿼리 문제가 일어나는 부분 --}}
                        by {{$article->user->name}}
                    </small>
                </li>
            @empty
                <p>글이 없습니다.</p>
            @endforelse
        </ul>
    </div>

    @if($articles->count()) {{-- count() 메서드는 $articles에 담긴 모델의 개수를 반 --}}
        <div class="text-center">
            {!! $articles->render() !!}
        </div>
    @endif
@stop