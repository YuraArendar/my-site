<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('published')->default(true);
            $table->string('alias',255);
            $table->integer('gallery_id');
            $table->integer('position');
            $table->timestamp('date_start')->nullable();
            $table->timestamps();
        });

        Schema::create('content_structure', function(Blueprint $table) {
            $table->integer('content_id')->unsigned()->index();
            $table->foreign('content_id')->references('id')->on('content')->onDelete('cascade');
            $table->integer('structure_id')->unsigned()->index();
            $table->foreign('structure_id')->references('id')->on('structure')->onDelete('cascade');
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
        Schema::drop('content');
        Schema::drop('structure_content');
    }
}
