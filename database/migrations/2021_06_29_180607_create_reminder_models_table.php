<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReminderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reminder', function (Blueprint $table) {
            $table->increments('cd_reminder');
            $table->text('ds_reminder');

            $table->integer('cd_user')->unsigned();
            $table->foreign('cd_user')->references('cd_user')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('tb_reminder');
    }
}
