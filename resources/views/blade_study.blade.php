{{-- 블레이드 문자열 보간 사용 --}}
<h1>{{ $greeting or "Hello" }} {{ $name or '' }}</h1>

{{-- 주석 --}}
<!--HTML 주석 안에서 {{ $name }}을(를) 출력합니다.-->
블레이드 주석 안에서 {{ $name }}을(를) 출력합니다.
<h1>{{ $greeting }} {{ $name }}</h1>
{{-- 위 코드 실행시 HTML주석은 변수는 치환되지만 나머지는 문자열로 화면 보이게 된다. --}}

{{-- 조건문 : 블레이드는 모든 제어구조에 @를 이용하고 end로 시작하는 키워드로 제어구조에 끝을 표시한다.--}}
{{-- @elseif도 사용할 수 있다. --}}
{{-- @unless(조건식)도 사용할 수 있다. ( @if(!조건식)과 같은 의미 )--}}
@if ($itemCount = count($items))
    <p>{{ $itemCount }} 종류의 과일이 있습니다.</p>
@else
    <p>엥~ 아무것도 없는데요?!</p>
@endif

{{-- 반복문 --}}
{{-- @for~@endfor, @while~@endwhile도 사용 가능--}}
{{-- @forelse라는 특수한 구조가 있는데, @if와 @foreach의 결합이다. 값이 있으면 @forelse, 없으면 empty를 탄다--}}
<ul>
    @foreach ($items as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>

<?php $items = []; ?>
<ul>
    @forelse($items as $item)
        <li>{{ $item }}</li>
    @empty
        <li>엥~ 아무것도 없는데요?!</li>
    @endforelse
</ul>

{{-- 템플릿 상속 --}}
{{-- style, script 섹션이 작동하게 하려면 상속받는 레이아웃에서 @yield로 style, script를 추가해야한다 --}}
{{-- include를 사용해서 조각 뷰를 삽입할 수 있다. --}}
@extends('layouts.master')

@section('style')
    <style>
        body {background: green; color: white;}
    </style>
@endsection

@section('content')
    <p>저는 자식 뷰의 'contents' 섹션입니다.</p>
    @include('partials.footer')
@endsection

@section('script')
    <script>
        alert("저는 자식 뷰의 'script' 섹션입니다.");
    </script>
@endsection

{{--layouts.master--}}
{{--partials.footer--}}