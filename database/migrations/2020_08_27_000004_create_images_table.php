<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('thumbnail_id')->unsigned()->default(0);
            //$table->foreign('thumbnail_id')
            //    ->references('id')->on('image_thumbnails')
            //    ->onDelete('cascade');
            $table->string('filename')->nullable(false)->default("");
            $table->string('filepath')->nullable(false)->default("");
            $table->string('title')->nullable(true);
            $table->string('description')->nullable(true);
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
        Schema::dropIfExists('images');
    }
}
