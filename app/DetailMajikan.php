<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailMajikan extends Model
{
    protected $table = 'detail_majikan';

    protected $fillable = [
        'majikan_id',
        'nomorKTP',
        'tel',
        'alamat',
        'fotoKTP',
        'fotoDiri',
        'tanggalMasuk',
    ];

    public function majikan()
    {
        return $this->belongsTo('App\Majikan', 'majikan_id', 'id');
    }
}
