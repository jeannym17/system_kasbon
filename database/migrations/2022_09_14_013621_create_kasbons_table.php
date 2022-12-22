<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasbons', function (Blueprint $table) {
            $table->id();
            $table->string('nokasbon')->unique();
            $table->date('tglmasuk')->nullable();
            $table->time('jammasuk')->nullable();
            $table->string('jeniskasbon')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nip')->nullable();
            // $table->string('username')->nullable();
            $table->unsignedBigInteger('id_unit')->nullable();
            $table->string('doksebelumnya')->nullable();
            $table->unsignedBigInteger('id_kodekasbon')->nullable();
            $table->unsignedBigInteger('id_jenis')->nullable();
            $table->unsignedBigInteger('id_kurs')->nullable();
            $table->string('proyek')->nullable();
            $table->text('uraianpengguna')->nullable();
            $table->bigInteger('iddpp')->nullable();
            $table->bigInteger('idppn')->nullable();
            $table->unsignedBigInteger('id_pph')->nullable();
            $table->bigInteger('idpph')->nullable();
            $table->bigInteger('total')->nullable();
            $table->bigInteger('konversi')->nullable();
            $table->bigInteger('k_iddpp')->nullable();
            $table->bigInteger('k_total')->nullable();
            $table->string('namavendor')->nullable();
            $table->bigInteger('haritempo')->nullable();
            $table->date('tgltempo')->nullable();
            $table->string('noinvoice')->nullable();
            $table->string('spph')->nullable();
            $table->string('po_vendor')->nullable();
            $table->string('po_customer')->nullable();
            $table->string('sjn')->nullable();
            $table->bigInteger('harga_jual')->nullable();
            $table->date('barang_datang')->nullable();
            $table->string('nopi')->nullable();
            $table->string('novkb')->nullable();
            $table->text('formatkasbon')->nullable();
            $table->bigInteger('transferke')->nullable();
            $table->string('id_bank')->nullable();
            $table->string('namarek')->nullable();
            $table->bigInteger('norek')->nullable();
            $table->string('file')->nullable();


            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kodekasbon')->references('id')->on('kode_kasbons')->onDelete('cascade');
            $table->foreign('id_unit')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->foreign('id_kurs')->references('id')->on('kurs')->onDelete('cascade');
            $table->foreign('id_pph')->references('id')->on('pphs')->onDelete('cascade');
            // $table->foreign('id_bank')->references('id')->on('bank')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasbons');
    }
}
