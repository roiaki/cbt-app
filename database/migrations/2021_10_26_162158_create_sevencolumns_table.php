<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevencolumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sevencolumns', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('event_id')->unsigned()->index();
            $table->integer('threecol_id')->unsigned()->index();
            
            $table->string('title');
            $table->string('content');
            $table->string('emotion_name');
            $table->integer('emotion_strength');
            $table->string('thinking');
            $table->string('basis_thinking');
            $table->string('opposite_fact');
            $table->string('new_thinking');
            $table->string('new_emotion');
            
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
                
            $table->foreign('threecol_id')
                ->references('id')
                ->on('threecolumns')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sevencolumns');
    }
}
