<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPPDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppd', function (Blueprint $table) {
            $table->id();
            $table->string('no_sppd')->unique();
            $table->string('doksebelumnya')->nullable();
            $table->date('tglmasuk')->nullable();
            $table->integer('jumlah')->nullable();
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
        Schema::dropIfExists('s_p_p_d_s');
    }
}
