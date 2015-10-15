<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {

            $table->char('hash', 32)->primary();
            $table->integer('size')->unsigned()->default(0);
            $table->integer('width')->unsigned()->default(0);
            $table->integer('height')->unsigned()->default(0);
            $table->string('mime')->default('');
            $table->double('seconds', 18, 8)->unsigned()->default(0);
            $table->string('format')->default('');
            $table->string('path')->default('');
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
        Schema::drop('files');
    }
}
