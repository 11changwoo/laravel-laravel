<?php

use Illuminate\Database\Seeder;

//마스터 시더
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //mysql 을 반환
        //config/database.php 에서 default 키에 할당된 값을 읽어온다.
        //SQLite 데이터베이스는 이 구문을 지원하지 않기 때문에 예외처리함
        //FOREIGN_KEY_CHECKS 설정을 끄지 않고 시딩을 실행하면 Illuminate\Database\QueryException 발생
        //시딩이 끝난다면 다시 켜야한다.
        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        //라라벨 5.1은 주석을 풀어둔다. 5.2이상은 시딩할 때 자동으로 주석을 풀고 잠근다.
        //Model::unguard();

        App\User::truncate(); //이 메서드는 테이블에 담긴 모든 데이터를 버린다. 지운다는 점에서 delete() 와 같지만, 기본 키를 1부터 재배열 한다는 점이 다르다.
        $this->call(UsersTableSeeder::class); //이 메서드는 $class::run() 메서드의 본문을 실행하고 콘솔에 결과를 출력한다.

        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);

        //Model::reguard();

        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }

        /*
         * php 객체 지향 연산자
         * php 는 객체 컨텍스트에서 클래스 멤버에 접근할 때 객체 연산자(->) 사용 ex)$user->name
         * 클래스 안에서 객체 자신을 참조할 때는 $this 키워드 사용 ex)$this->>name
         * 객체 컨텍스트에서는 부모 클래스도 $this 로 참조한다. 프로퍼티, 상수, 메서드 등을 통칭하여 클래스 멤버라 한다.
         *
         * 정적 클래스 멤버에 접근할 때는 범위 확인 연산자(::) 사용 ex)Str::random()
         * 클래스 안에서 정적 멤버들과 결합해서 사용할 때는 자신을 표현하기 위해 self 키워드 사용 ex)self::random()
         * 정적 프로퍼티에 접근할 때는 $ 기호를 붙여야 한다 ex)Class::$property
         * 또한, 부모 클래스를 지칭할 때는 $parent 키워드 사용
         *
         * php 에서 클래스와 메서드를 연결해서 문서에 표현할 때는 정적 선언 여부와 상관없이 범위 확인 연산자(::) 사용
        */
    }
}
