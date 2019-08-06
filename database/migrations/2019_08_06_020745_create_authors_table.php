<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) { //콜백 함수의 $table이 Illuminate\Database\Schema\Blueprint 클래스의 인스턴스여야 한다고 강제하는 것, 아니라면 $table->string 같은 코드가 성립 X
            $table->bigIncrements('id');
            $table->string('email',255);
            $table->string('password', 60);
            $table->timestamps();
        });

        //테이블을 지운다.
//        Schema::drop('authors', function (Blueprint $table) {
//
//        });

        //테이블 생성,삭제를 제외한 나머지 대부분의 스키마 관련 작업을 담는다.
//        Schema::table('authors', function (Blueprint $table) {
//
//        });

        //모든 열 타입에 대응되는 메서드
//        boolean(), dateTime(), enum(), integer(), timestamp() 등의 열 타입 메서드
//        timestamps(), softDelete() 등의 도우미 메서드
//        nullable(), default(), unsigned() 등의 장식 메서드
//        unique(), index() 등의 인덱스 메서드
//        mysql 5.7 이상이라면 json() 열 타입 사용 가능
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
