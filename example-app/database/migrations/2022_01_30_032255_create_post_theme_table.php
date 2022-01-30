<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_theme', function (Blueprint $table) {
            $table->id();

            $table->string('name',20)
                ->comment('テーマ名');

            $table->bigInteger('user_id')
                ->unsigned()
                ->comment('ユーザー');

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
        Schema::dropIfExists('post_theme');
    }
}
