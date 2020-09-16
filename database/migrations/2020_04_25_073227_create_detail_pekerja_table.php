<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPekerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pekerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pekerja_id');
            $table->string('nomorKTP');
            $table->date('ttl');
            $table->string('tel');
            $table->string('alamat');
            $table->string('keahlian');
            $table->string('agama');
            $table->string('fotoKTP');
            $table->string('fotoDiri');
            $table->double('rating')->default(5);
            $table->date('tanggalMasuk');
            $table->date('tanggalKeluar')->nullable();
            $table->timestamps();
            $table->foreign('pekerja_id')->references('id')->on('pekerja');
        });

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '1',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '2',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '3',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '4',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '5',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '6',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '7',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '8',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '9',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '10',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        //Create babysitter
        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '11',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '12',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '13',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '14',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_pekerja')->insert(
            array(
                'pekerja_id' => '15',
                'nomorKTP' => '3208573452890031',
                'ttl' => '1995-12-02',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'keahlian' => 'memasak',                
                'agama' => 'islam',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pekerja');
    }
}
