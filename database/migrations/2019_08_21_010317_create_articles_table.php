<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();    //unsigned: 양의 정수로 값을 제한, 외래 키 열은 양의 정수 제약조건을 선언하는 게 좋다
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            //테이블끼리 외래 키 관계를 연결
            //articles 테이블의 user_id 열은 users 테이블의 id 열을 참조한다는 의미
            //onUpdate('cascade'), onDelete('cascade') 는 참조하는 열이 변경되거나 삭제될 때의 동작옵션을 정의한 것
            //테이블이름_열이름_foreign 의 형태로 이름이 생성되고, 이는 외래 키 관계를 삭제할 때  사용된다. ex)$table->dropForeign('articles_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            //생성시 오류가 났었는데, 외래 키로 설정하려는 열과 참조하는 열의 타입을 맞춰줘야 하는듯
            //users 테이블의 id : bigIncrements, articles 테이블의 user_id integer 일때 오류가 남
            //users 테이블의 id : bigIncrements, articles 테이블의 user_id bigInteger 로 하니까 잘 실행됨
            //해본건 아니지만 users 테이블의 id : integer, articles 테이블의 user_id integer 이렇게 해도 될거같음
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
