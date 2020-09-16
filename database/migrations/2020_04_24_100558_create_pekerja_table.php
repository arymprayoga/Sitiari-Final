<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerja', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['tersedia', 'bekerja', 'resign','blacklist', 'pending', 'resign_pending'])->default('pending');
            $table->enum('jenisPekerjaan', ['pembantu', 'babysitter', 'perawat']);
            $table->string('gaji')->default('1500000');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('pekerja')->insert(
            array(
                'name' => 'pembantu1',
                'email' => 'pembantu@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'pembantu2',
                'email' => 'pembantu2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'pembantu3',
                'email' => 'pembantu3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'pembantu4',
                'email' => 'pembantu4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'pembantu5',
                'email' => 'pembantu5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'pembantu',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'babysitter1',
                'email' => 'babysitter@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'babysitter2',
                'email' => 'babysitter2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'babysitter3',
                'email' => 'babysitter3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'babysitter4',
                'email' => 'babysitter4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'babysitter5',
                'email' => 'babysitter5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'babysitter',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'perawat1',
                'email' => 'perawat@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'perawat2',
                'email' => 'perawat2@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'perawat3',
                'email' => 'perawat3@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'perawat4',
                'email' => 'perawat4@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
            )
        );

        DB::table('pekerja')->insert(
            array(
                'name' => 'perawat5',
                'email' => 'perawat5@me.com',
                'password' => Hash::make('qwertyuiop'),
                'status' => 'tersedia',
                'jenisPekerjaan' => 'perawat',
                
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
        Schema::dropIfExists('pekerja');
    }
}
