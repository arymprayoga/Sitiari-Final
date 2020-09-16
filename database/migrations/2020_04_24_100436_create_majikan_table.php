<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majikan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['aktif', 'nonaktif', 'blacklist'])->default('aktif');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('majikan')->insert(
            array(
                'name' => 'Majikan1',
                'email' => 'majikan@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',                
            )
        );

        DB::table('majikan')->insert(
            array(
                'name' => 'Majikan2',
                'email' => 'majikan2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'name' => 'Majikan3',
                'email' => 'majikan3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'name' => 'Majikan4',
                'email' => 'majikan4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
            )
        );

        DB::table('majikan')->insert(
            array(
                'name' => 'Majikan5',
                'email' => 'majikan5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'aktif',
                
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
        Schema::dropIfExists('majikan');
    }
}
