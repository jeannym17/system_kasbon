<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganKasbonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_kasbon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kasbon')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_kasbon')->references('id')->on('kasbons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterangan_kasbon');
    }
}
