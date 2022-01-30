<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment', function (Blueprint $table) {
            $table->id();

            $table->foreignId('theme_id')
                ->comment('テーマID')
                ->constrained('post_theme');

            $table->bigInteger('user_id')
                ->unsigned()
                ->comment('ユーザーID');

            $table->string('comment',200)
                ->comment('コメント');

            $table->tinyInteger('deleted')
                ->unsigned()
                ->default(0)
                ->comment('削除済み');

            $table->dateTime('created_at')
                ->useCurrent();

            $table->dateTime('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comment');
    }
}
