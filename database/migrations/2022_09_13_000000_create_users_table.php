<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nip');
            $table->unsignedBigInteger('id_unit');
            $table->unsignedBigInteger('id_jabatan');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_unit')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
