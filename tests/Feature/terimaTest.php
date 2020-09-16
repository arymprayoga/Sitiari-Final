<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Pekerja;
use App\DetailPekerja;
use App\User;

class terimaTest extends TestCase
{
    use RefreshDatabase;
    public function testPath1()
    {   
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $response = $this->from('/home')->post('/terima-pekerja', ['id' => 1]);
        $response->assertRedirect('/home');
        $response->assertSessionHas('sukses', $value = 'Konfirmasi Berhasil');
        $this->assertTrue(true);
    }

    public function testPath2()
    {   
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $response = $this->from('/home')->post('/terima-pekerja', ['id' => 20]);
        $response->assertRedirect('/home');
        $response->assertSessionHas('alert', $value = 'Terjadi Kesalahan');
        $this->assertTrue(true);
    }
}
