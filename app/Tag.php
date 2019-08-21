<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    //article 테이블과 다대다 관계
    public function articles() {
        return $this->belongsToMany(Article::class); // 나(tag)는 여러 개의 article 에 소속된다.
    }
}
