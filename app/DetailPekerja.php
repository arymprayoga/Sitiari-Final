<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class DetailPekerja extends Model
{
    use Rateable;
    protected $table = 'detail_pekerja';

    protected $fillable = [
        'pekerja_id',
        'nomorKTP',
        'ttl',
        'tel',
        'alamat',
        'keahlian',
        'agama',
        'fotoKTP',
        'fotoDiri',
        'tanggalMasuk',
        'rating',
    ];

    public function pekerja()
    {
        return $this->belongsTo('App\Pekerja', 'pekerja_id', 'id');
    }
}
