<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //타이핑을 해도 되지만, artisan 명령줄 인터페이스로 모델 뼈대 코드를 빠르게 생성할 수 있다.
    //php artisan make:model Post
    //테이블 이름은 복수, 모델 이름은 단수로 짓는다.
    //모델이름이 Author 면 테이블은 Authors 이름의 테이블을 쓰는게 관례.
    //만약 관례를 따르지 않는다면 알려줘야 한다.
    //ex)$table = 'user'; 처럼 사용하는 테이블 이름을 알려줘야한다.
}
