<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //public 으로 선언된 모델 프로퍼티 값을 은닉하는 방법이 $hidden
    //직접접근하면 값을 읽거나 쓸 수 있다.
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //다(many)가 되는 쪽 모델로 접근하는 메서드 이름은 복수
    public function articles() {
        return $this->hasMany(Article::class, 'user_id'); // 나(user)는 여러 개의 article 을 가지고 있다.
    }
}
