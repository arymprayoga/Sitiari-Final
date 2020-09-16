<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pekerja_id');
            $table->unsignedBigInteger('majikan_id');
            $table->date('waktu_pesan');
            $table->date('waktu_bayar')->nullable();
            $table->string('jumlah_bayar');
            $table->enum('status_pembayaran', ['pending', 'success', 'failed', 'expired'])->default('pending');
            $table->enum('status_pemesanan', ['pending', 'gagal', 'aktif', 'nonaktif', 'selesai', 'refund'])->default('pending');
            $table->double('rating')->nullable();
            $table->string('snap_token')->nullable();
            $table->boolean('pertama');
            $table->timestamps();
            $table->foreign('pekerja_id')->references('id')->on('pekerja');
            $table->foreign('majikan_id')->references('id')->on('majikan');
        });

        // DB::statement("ALTER TABLE pemesanan AUTO_INCREMENT = 1000;");
        DB::table('pemesanan')->insert(
            array(
                'id' => 40,
                'pekerja_id' => 1,
                'majikan_id' => 1,
                'waktu_pesan' => '2019-12-02',
                'jumlah_bayar' => '1500000',
                'pertama' => '1',
            )
        );
        DB::table('pemesanan')->where('id', 40)->delete();
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 1,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 1,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 1,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
        // DB::table('pemesanan')->insert(
        //     array(
        //         'pekerja_id' => 3,
        //         'majikan_id' => 1,
        //         'waktu_pesan' => '2019-12-02',
        //         'jumlah_bayar' => '1500000',
        //         'pertama' => '1',
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
