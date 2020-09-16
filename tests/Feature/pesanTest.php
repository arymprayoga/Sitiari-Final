<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Majikan;
use App\Pekerja;
use App\DetailPekerja;
use App\User;

class pesanTest extends TestCase
{
    use RefreshDatabase;
    public function testPath1()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(Majikan::class)->create());
        $response = $this->from('/home')->post('/majikan/pemesanan/store', [
            'id_majikan' => 100,
            'id_pekerja' => 1,
            'jumlah_bayar' => 1500000,
            'kategori' => 1,
            ]);
        $response->assertSeeText("Terjadi Kesalahan", $escaped = true);
        $this->assertTrue(true);
    }

    public function testPath2()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(Majikan::class)->create());
        $response = $this->from('/home')->post('/majikan/pemesanan/store', [
            'id_majikan' => 2,
            'id_pekerja' => 1,
            'jumlahBayar' => 1234000,
            'kategori' => 1,
            ]);
        $response->assertStatus(201);
        $this->assertTrue(true);
    }

    public function testPath3()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(Majikan::class)->create());
        $response = $this->from('/home')->post('/majikan/pemesanan/store', [
            'id_majikan' => 2,
            'id_pekerja' => 1,
            'kategori' => 1,
            ]);
            $response->assertSeeText("Terjadi Kesalahan", $escaped = true);
            $this->assertTrue(true);
    }
}
