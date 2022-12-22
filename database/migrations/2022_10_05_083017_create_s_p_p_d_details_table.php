<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPPDDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppd_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sppd')->nullable();
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('departemen')->nullable();
            $table->string('instansi')->nullable();
            $table->string('nokontrak')->nullable();
            $table->string('kasbondinas')->nullable();
            $table->date('tglberangkat')->nullable();
            $table->date('tglpulang')->nullable();
            $table->integer('hari')->nullable();
            $table->unsignedBigInteger('id_kurs')->nullable();
            $table->integer('id_rate')->nullable();
            $table->integer('uanglumpsum')->nullable();
            $table->timestamps();

            $table->foreign('id_sppd')->references('id')->on('sppd')->onDelete('cascade');
            $table->foreign('id_rate')->references('harga')->on('rates')->onDelete('cascade');
            $table->foreign('id_kurs')->references('id')->on('kurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_p_p_d_details');
    }
}
