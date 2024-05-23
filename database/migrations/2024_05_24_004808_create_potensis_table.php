<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_potensi_id');
            $table->foreignId('objek_wisata_id');
            $table->string('nama');
            $table->double('harga_tiket');
            $table->text('alamat');
            $table->text('longitude');
            $table->text('latitude');
            $table->text('deskripsi');
            $table->text('fasilitas');
            $table->text('sosial_media');
            $table->string('kontak');
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
        Schema::dropIfExists('potensis');
    }
}
