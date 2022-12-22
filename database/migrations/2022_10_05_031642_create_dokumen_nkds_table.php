<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenNkdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_nkd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dnk')->nullable();
            $table->string('dokumen')->nullable();
            $table->float('nominal')->nullable();
            $table->timestamps();

            $table->foreign('id_dnk')->references('id')->on('dokumen_nk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_nkds');
    }
}
