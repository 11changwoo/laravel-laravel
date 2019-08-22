<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        //모델 팩토리에 user_id 정의가 없으므로 사용자와의 관계를 이용해서 포럼 글을 만든다.
        //$users 변수에 사용자 컬렉션을 담고 컬렉션을 순회하면서 포럼 글을 만드는 식으로 코딩
        //each 대신 foreach($users as $user) 로 사용해도 무방
        $users->each(function ($user) {
           //make() 메서드는 새로운 모델 인스턴스를 반환하고 DB에 저장은 하지 않는다.
           //save() 메서드에 인자로 줌으로써 DB에 저장한다. save() 메서드는 create() 와 같은 일을 한다.
           $user->articles()->save(
               factory(App\Article::class)->make()
           );
        });
    }
}
