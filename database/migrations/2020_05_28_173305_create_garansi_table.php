<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaransiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garansi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id_lama');
            $table->unsignedBigInteger('pemesanan_id_baru')->nullable();
            $table->string('alasan')->nullable;
            $table->date('waktu_pengajuan_refund')->nullable();
            $table->enum('status_refund', ['disetujui', 'ditolak'])->nullable();
            $table->date('waktu_konfirmasi_refund')->nullable();
            $table->timestamps();
            $table->foreign('pemesanan_id_lama')->references('id')->on('pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garansi');
    }
}
