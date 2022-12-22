<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_kasbon')->nullable();
            $table->string('nokasbon')->unique()->nullable();
            $table->unsignedBigInteger('id_dv')->nullable();
            $table->unsignedBigInteger('id_dc')->nullable();
            $table->unsignedBigInteger('id_di')->nullable();
            $table->unsignedBigInteger('id_dp')->nullable();
            $table->unsignedBigInteger('id_dd')->nullable();
            $table->unsignedBigInteger('id_kt')->nullable();
            $table->string('status')->nullable();

            $table->foreign('id_kasbon')->references('id')->on('kasbons')->onDelete('cascade');
            $table->foreign('nokasbon')->references('nokasbon')->on('kasbons')->onDelete('cascade');
            $table->foreign('id_dv')->references('id')->on('d_vendors')->onDelete('cascade');
            $table->foreign('id_dc')->references('id')->on('d_customers')->onDelete('cascade');
            $table->foreign('id_di')->references('id')->on('d_impors')->onDelete('cascade');
            $table->foreign('id_dp')->references('id')->on('d_pajaks')->onDelete('cascade');
            $table->foreign('id_dd')->references('id')->on('d_dinas')->onDelete('cascade');
            $table->foreign('id_kt')->references('id')->on('keterangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelengkapans');
    }
}
