<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_keterangan')->nullable();
            $table->string('kekurangan')->nullable();
            $table->date('tgl_kelengkapan')->nullable();
            $table->timestamps();

            $table->foreign('id_keterangan')->references('id')->on('keterangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterangan_details');
    }
}
