<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganNonKasbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_non_kasbons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nonkasbon')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_nonkasbon')->references('id')->on('nonkasbons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterangan_non_kasbons');
    }
}
