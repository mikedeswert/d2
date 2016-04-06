<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameGroupMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_group_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('game_group_id')->unsigned();
            $table->foreign('game_group_id')
                ->references('id')->on('game_groups')
                ->onDelete('no action');
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
        Schema::drop('game_group_members');
    }
}
