<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringSPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoringsp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kasbon')->nullable();
            $table->string('ptj')->nullable();
            $table->string('sp1')->nullable();
            $table->date('tgl_sp1')->nullable();
            $table->date('jt_sp1')->nullable();
            $table->string('sp2')->nullable();
            $table->date('tgl_sp2')->nullable();
            $table->date('jt_sp2')->nullable();
            $table->string('sp3')->nullable();
            $table->date('tgl_sp3')->nullable();
            $table->date('jt_sp3')->nullable();
            $table->string('mts')->nullable();
            $table->date('tgl_mts')->nullable();
            $table->string('pbsdm')->nullable();
            $table->date('tgl_pbsdm')->nullable();
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
        Schema::dropIfExists('monitoring_s_p_s');
    }
}
