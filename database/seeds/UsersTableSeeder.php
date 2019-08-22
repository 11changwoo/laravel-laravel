<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //str_random(int $length = 16): 라라벨 도우미 함수, $length 바이트짜리 랜덤 문자열 반환
        //sprintf(): php 내장 함수
//        App\User::create([
//           'name' => sprintf('%s %s', Str::random(3), Str::random(4)), //Str::random(3).' '.Str::random(4), sprintf() 대신 대체 가능
//           'email' => Str::random(10) . '@example.com',
//           'password' => bcrypt('password'),
//        ]);

        //factory() 는 도우미 함수
        //make() 메서드는 모델 팩토리가 임의로 채운 값을 이용해서 새로운 모델 인스턴스를 만들기만 한다.
        //DB에 저장하려면 create() 메서드를 사용
        factory(App\User::class, 5)->create(); //users 테이블에 5명의 새로운 사용자가 추가된다.
    }
}
