<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pekerja_id');
            $table->date('waktu_pemesanan');
            $table->date('waktu_bayar')->nullable();
            $table->string('jumlah_bayar');
            $table->enum('status_penggajian', ['belum', 'sudah'])->default('belum');
            $table->timestamps();
            $table->foreign('pekerja_id')->references('id')->on('pekerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggajian');
    }
}
