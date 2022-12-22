<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiPertanggungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi_pertanggungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanggungan')->nullable();
            $table->string('status')->nullable();
            $table->string('vkp_a_1')->nullable();
            $table->unsignedBigInteger('id_vkp_a_1')->nullable();
            $table->dateTime('tgl_vkp_a_1')->nullable();
            $table->string('vkp_a_12')->nullable();
            $table->unsignedBigInteger('id_vkp_a_12')->nullable();
            $table->dateTime('tgl_vkp_a_12')->nullable();
            $table->string('vkp_a_13')->nullable();
            $table->unsignedBigInteger('id_vkp_a_13')->nullable();
            $table->dateTime('tgl_vkp_a_13')->nullable();
            $table->string('vkp')->nullable();
            $table->unsignedBigInteger('id_vkp')->nullable();
            $table->dateTime('tgl_vkp')->nullable();
            $table->string('vkp_a_2')->nullable();
            $table->unsignedBigInteger('id_vkp_a_2')->nullable();
            $table->dateTime('tgl_vkp_a_2')->nullable();
            $table->string('vkp_a_3')->nullable();
            $table->unsignedBigInteger('id_vkp_a_3')->nullable();
            $table->dateTime('tgl_vkp_a_3')->nullable();
            $table->string('vkp_a_4')->nullable();
            $table->unsignedBigInteger('id_vkp_a_4')->nullable();
            $table->dateTime('tgl_vkp_a_4')->nullable();
            $table->timestamps();

            $table->foreign('id_pertanggungan')->references('id')->on('pertanggungans')->onDelete('cascade');
            $table->foreign('id_vkp')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vkp_a_1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vkp_a_12')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vkp_a_13')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vkp_a_2')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vkp_a_3')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vkp_a_4')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasi_pertanggungans');
    }
}
