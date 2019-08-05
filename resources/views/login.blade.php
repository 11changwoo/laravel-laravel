@extends('layouts.main')

@section('style')
    <style>
        header {
            text-align: center;
            margin-top: 5%;
        }

        #form_div {
            margin-bottom: 5%;
        }
        form {
            text-align: center;
        }
        input {
            margin-bottom: 1%;
        }
        button {
            width: 5%;
        }

        footer {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <header>
        <h1>로그인</h1>
    </header>
    <div id="form_div">
        <form action="">
            <input type="text" name="id" placeholder="아이디">
            <br>
            <input type="password" name="password" placeholder="비밀번호">
            <br>
            <button type="submit">로그인</button>
        </form>
    </div>
    <div>
        @include('partials.tail')
    </div>
@endsection

@section('script')

@endsection