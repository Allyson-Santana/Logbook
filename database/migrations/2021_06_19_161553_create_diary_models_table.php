<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_diary', function (Blueprint $table) {
            $table->increments('cd_diary');
            $table->date('dt_diary');
            $table->text('ds_references');
            $table->text('ds_activity_preview');
            $table->text('ds_difficulty_development'); 
            $table->text('ds_guidelines_teacher_during');
            $table->text('ds_guidelines_teacher_be');

            $table->integer('cd_project')->unsigned();
            $table->foreign('cd_project')->references('cd_project')->on('tb_project')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_diary');
    }
}
