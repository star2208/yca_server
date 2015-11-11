<?php

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
            $table->string('title')->index();
            $table->morphs('author');
            $table->json('content')->default(json_encode(['content' => []]));
            $table->morphs('topic');
            $table->string('cover');
            $table->integer('style')->index();
            $table->string('describe')->index();
            $table->dateTime('publishTime')->index();
            $table->boolean('accepted')->index()->default(false);
            $table->softDeletes()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
