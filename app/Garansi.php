<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Garansi extends Model
{
    /**
     * Fillable attribute.
     *
     * @var array
     */

    protected $table = 'garansi';

    protected $fillable = [
        'pemesanan_id_lama',
        'pemesanan_id_baru',
        'alasan',
        'waktu_pengajuan_refund',
        'status_refund',
        'waktu_konfirmasi_refund',
    ];
 
    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan', 'pemesanan_id_lama', 'id');
    }
}
