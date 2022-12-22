<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDImporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_impors', function (Blueprint $table) {
            $table->id();

            $table->string('di_pib')->nullable();
            $table->string('di_bl')->nullable();
            $table->string('di_com')->nullable();
            $table->string('di_coo')->nullable();
            $table->string('di_invoicecustom')->nullable();
            $table->string('di_sjncustom')->nullable();

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
        Schema::dropIfExists('d_impors');
    }
}
