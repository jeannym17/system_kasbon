<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_customers', function (Blueprint $table) {
            $table->id();
            $table->string('dc_memointernal')->nullable();
            $table->string('dc_spph')->nullable();
            $table->string('dc_ko')->nullable();
            $table->string('dc_loi')->nullable();
            $table->string('dc_invoicecustom')->nullable();
            $table->string('dc_sjncustom')->nullable();
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
        Schema::dropIfExists('d_customers');
    }
}
