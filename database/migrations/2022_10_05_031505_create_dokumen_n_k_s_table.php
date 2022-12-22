<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenNKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_nk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nonkasbon')->nullable();
            $table->float('total')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('dokumen_n_k_s');
    }
}
