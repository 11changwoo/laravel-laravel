<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     * 마이그레이션을 실행하는 메서드
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
//            $table->increments('id');
            $table->bigIncrements('id');    //자동 증가 기본키 열을 만든다.
            $table->string('title');
            $table->text('body');
            $table->timestamps();   //created_at, updated_at 타임스탬프 열을 만든다.
        });
    }

    /**
     * Reverse the migrations.
     * 롤백을 위한 메서드
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
