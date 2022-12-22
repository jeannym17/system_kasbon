<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiNonKasbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi_non_kasbons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nonkasbon')->nullable();
            $table->string('status')->nullable();
            $table->string('vnk_a_1')->nullable();
            $table->unsignedBigInteger('id_vnk_a_1')->nullable();
            $table->dateTime('tgl_vnk_a_1')->nullable();
            $table->string('vnk_a_12')->nullable();
            $table->unsignedBigInteger('id_vnk_a_12')->nullable();
            $table->dateTime('tgl_vnk_a_12')->nullable();
            $table->string('vnk_a_13')->nullable();
            $table->unsignedBigInteger('id_vnk_a_13')->nullable();
            $table->dateTime('tgl_vnk_a_13')->nullable();
            $table->string('vnk')->nullable();
            $table->unsignedBigInteger('id_vnk')->nullable();
            $table->dateTime('tgl_vnk')->nullable();
            $table->string('vnk_a_2')->nullable();
            $table->unsignedBigInteger('id_vnk_a_2')->nullable();
            $table->dateTime('tgl_vnk_a_2')->nullable();
            $table->string('vnk_a_3')->nullable();
            $table->unsignedBigInteger('id_vnk_a_3')->nullable();
            $table->dateTime('tgl_vnk_a_3')->nullable();
            $table->string('vnk_a_4')->nullable();
            $table->unsignedBigInteger('id_vnk_a_4')->nullable();
            $table->dateTime('tgl_vnk_a_4')->nullable();
            $table->timestamps();

            $table->foreign('id_nonkasbon')->references('id')->on('nonkasbons')->onDelete('cascade');
            $table->foreign('id_vnk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vnk_a_1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vnk_a_12')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vnk_a_13')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vnk_a_2')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vnk_a_3')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_vnk_a_4')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasi_non_kasbons');
    }
}
