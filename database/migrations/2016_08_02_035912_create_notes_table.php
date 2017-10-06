<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Notes table */
        Schema::create('notes', function (Blueprint $table) {
            $table->string('name');
            $table->integer('user_id')->nullabe();
            $table->text('text');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['name', 'user_id']);
        });

        // Schema::create('note_user', function (Blueprint $table) {
        //     $table->integer('user_id');
        //     $table->string('note_name');
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('note_name')->references('name')->on('notes');
        //     $table->primary(['note_name', 'user_id']);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('note_user');
        Schema::drop('notes');
    }
}
