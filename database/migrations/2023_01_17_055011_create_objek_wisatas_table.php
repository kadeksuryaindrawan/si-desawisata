<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_wisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengelola_id')->nullable();
            $table->foreignId('kategori_id');
            $table->string('nama');
            $table->double('harga');
            $table->text('alamat');
            $table->text('longitude');
            $table->text('latitude');
            $table->text('deskripsi');
            $table->text('fasilitas');
            $table->text('foto');
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
        Schema::dropIfExists('objek_wisatas');
    }
}
