<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->char('nik',8)->unique();
            $table->string('nama');
            $table->char('jenis_kelamin',1);
            $table->bigInteger('bagian_id')->unsigned();
            $table->text('alamat')->nullable();
            $table->timestamps();

            $table->foreign('bagian_id')->references('id')->on('bagians')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
