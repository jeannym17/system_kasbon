<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganPertanggungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_pertanggungan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanggungan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_pertanggungan')->references('id')->on('pertanggungans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterangan_pertanggungans');
    }
}
