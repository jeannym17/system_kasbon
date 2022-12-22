<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanggungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanggungans', function (Blueprint $table) {
            $table->id();
            $table->string('nokasbon')->unique()->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_kasbon')->nullable();
            $table->unsignedBigInteger('id_kodekasbon')->nullable();
            $table->string('nip')->nullable();
            $table->unsignedBigInteger('id_unit')->nullable();
            $table->string('jeniskasbon')->nullable();
            $table->string('namavendor')->nullable();
            $table->string('noinvoice')->nullable();
            $table->string('proyek')->nullable();
            $table->string('po_vendor')->nullable();
            $table->string('po_customer')->nullable();
            $table->string('uraianpengguna')->nullable();
            $table->string('formatkasbon')->nullable();
            $table->string('nominalkasbon')->nullable();
            $table->date('tgltempo')->nullable();
            $table->integer('haritempo')->nullable();
            $table->string('novkbkasbon')->nullable();
            $table->string('tglbayarkeuser')->nullable();
            $table->integer('nilaiptj')->nullable();
            $table->date('tglptj')->nullable();
            $table->integer('selisihptj')->nullable();
            $table->string('novkbselisihptj')->nullable();
            $table->string('nilaiselisihptj')->nullable();
            $table->integer('selisihptjakhir')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_kodekasbon')->references('id')->on('kode_kasbons')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_unit')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('nokasbon')->references('nokasbon')->on('kasbons')->onDelete('cascade');
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
        Schema::dropIfExists('pertanggungans');
    }
}
