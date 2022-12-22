<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDPajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('dp_kesesuaianfaktur')->nullable();
            $table->string('dp_pajakpenghasilan')->nullable();
            $table->string('dp_suratnonpkp')->nullable();
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
        Schema::dropIfExists('d_pajaks');
    }
}
