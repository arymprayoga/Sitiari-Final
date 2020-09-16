<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table = 'penggajian';

    protected $fillable = [
        'pekerja_id',
        'waktu_pemesanan',
        'waktu_bayar',
        'jumlah_bayar',
        'status_penggajian'
    ];

    public function pekerja(){
        return $this->belongsTo('App\Pekerja', 'pekerja_id', 'id');
    }

    public function setBayar()
    {
        $now = date('Y-m-d');
        $this->attributes['status_penggajian'] = 'sudah';
        $this->attributes['waktu_bayar'] = $now;
        self::save();
    }
}
