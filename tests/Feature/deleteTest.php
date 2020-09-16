<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Pekerja;
use App\DetailPekerja;
use App\User;

class deleteTest extends TestCase
{
    use RefreshDatabase;
    public function testPath1()
    {   
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $this->assertCount(1, Pekerja::all());
        $this->assertCount(1, DetailPekerja::all());
        $response = $this->from('/home')->post('/delete-pekerja', ['id' => 1]);
        $this->assertCount(0, Pekerja::all());
        $this->assertCount(0, DetailPekerja::all());
        $response->assertRedirect('/home');
        $response->assertSessionHas('sukses', $value = 'Penghapusan Berhasil');
        $this->assertTrue(true);
    }

    public function testPath2()
    {   
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $this->assertCount(1, Pekerja::all());
        $this->assertCount(1, DetailPekerja::all());
        $response = $this->from('/home')->post('/delete-pekerja', ['id' => 2]);
        $this->assertCount(1, Pekerja::all());
        $this->assertCount(1, DetailPekerja::all());
        $response->assertRedirect('/home');
        $response->assertSessionHas('alert', $value = 'Data Tidak Ditemukan');
        $this->assertTrue(true);
    }
}
