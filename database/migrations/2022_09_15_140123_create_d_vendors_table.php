<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('dv_invoice')->nullable();
            $table->string('dv_kwitansi')->nullable();
            $table->string('dv_povendor')->nullable();
            $table->string('dv_sjnvendor')->nullable();
            $table->string('dv_packcinglist')->nullable();
            $table->string('dv_testreport')->nullable();
            $table->string('dv_bapp')->nullable();
            $table->string('dv_lppb')->nullable();
            $table->string('dv_ko')->nullable();
            $table->string('dv_spp')->nullable();
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
        Schema::dropIfExists('d_vendors');
    }
}
