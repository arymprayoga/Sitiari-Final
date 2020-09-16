<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMajikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_majikan', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('majikan_id');
            $table->string('nomorKTP');
            $table->string('tel');
            $table->string('alamat');
            $table->string('fotoKTP');
            $table->string('fotoDiri');
            $table->date('tanggalMasuk');
            $table->date('tanggalKeluar')->nullable();
            $table->timestamps();
            $table->foreign('majikan_id')->references('id')->on('majikan');
        });

        DB::table('detail_majikan')->insert(
            array(
                'majikan_id' => '1',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'majikan_id' => '2',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'majikan_id' => '3',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'majikan_id' => '4',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
                'tanggalMasuk' => '2019-12-02',
                'fotoDiri' => '1575123540.png',
                'fotoKTP' => '1575123541.png',                
            )
        );

        DB::table('detail_majikan')->insert(
            array(
                'majikan_id' => '5',
                'nomorKTP' => '3208573452890031',
                'tel' => '081311283766',
                'alamat' => 'malang',
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
        Schema::dropIfExists('detail_majikan');
    }
}
