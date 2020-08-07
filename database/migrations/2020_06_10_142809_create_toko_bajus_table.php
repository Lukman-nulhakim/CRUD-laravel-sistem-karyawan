<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokoBajusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toko_bajus', function (Blueprint $table) {
            $table->bigIncrements('id_toko');
            $table->string('nama_toko');
            $table->text('alamat_toko');
            $table->string('merk_baju');
            $table->string('pengelola');
            $table->text('foto');
            $table->integer('harga');
            $table->string('warna');
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
        Schema::dropIfExists('toko_bajus');
    }
}
