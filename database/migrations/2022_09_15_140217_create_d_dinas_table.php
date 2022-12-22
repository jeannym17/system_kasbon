<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_dinas', function (Blueprint $table) {
            $table->id();
            $table->string('dd_tickettransport')->nullable();
            $table->string('dd_notamakan')->nullable();
            $table->string('dd_boardingpass')->nullable();
            $table->string('dd_notapenginapan')->nullable();
            $table->string('dd_sppd')->nullable();
            $table->string('dd_lapdinas')->nullable();
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
        Schema::dropIfExists('d_dinas');
    }
}
