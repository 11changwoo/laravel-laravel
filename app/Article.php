<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    //User 테이블과 일대다 관계
    //일(one)이 되는 쪽 모델로 접근하는 메서드 이름은 단수
    public function user() {
        //엘로퀀트는 모델 이름으로 외래 키의 열 이름을 추정한다.
        //그래서 User 모델과 관계를 연결하는 외래 키 이름은 user_id 로 지었으나
        //다른 이름의 열을 외래 키로 사용한다면, 다음과 같이 2번째 매개변수로 알려줘야 한다.
        return $this->belongsTo(User::class, 'user_id'); // 나(article)는 user 소속입니다.
    }

    //Tag 테이블과 다대다 관계
    public function tags() {
        //피벗 테이블에 다른 이름을 사용한다면, 엘로퀀트에게 belongsToMany() 메서드의 두번째 인자로 알려줘야 한다.
        //그리고 외래 키의 열 이름은 모델이름_id 로 일대다와 같다. 다른 외래 키 열을 사용한다면 belongsToMany() 메서드의 세번째 인자로 알려줘야 한다.
        return $this->belongsToMany(Tag::class); // 나(article)는 여러 개의 tag 에 소속된다.
    }
}
