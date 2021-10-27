<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user_project', function (Blueprint $table) {
            $table->integer('cd_user')->unsigned();
            $table->integer('cd_project')->unsigned();

            $table->foreign('cd_user')->references('cd_user')->on('tb_user')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_user_project');
    }
}
