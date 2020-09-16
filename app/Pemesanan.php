<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Pemesanan extends Model
{
    /**
     * Fillable attribute.
     *
     * @var array
     */

    protected $table = 'pemesanan';

    protected $fillable = [
        'pekerja_id',
        'majikan_id',
        'waktu_pesan',
        'waktu_bayar',
        'jumlah_bayar',
        'status_pemesanan',
        'status_pembayaran',
        'rating',
        'snap_token',
        'pertama',
    ];
 
    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setPending()
    {
        $this->attributes['status_pemesanan'] = 'pending';
        $this->attributes['status_pembayaran'] = 'pending';
        self::save();
    }
 
    /**
     * Set status to Success
     *
     * @return void
     */
    public function setSuccess($waktu)
    {
        $this->attributes['status_pemesanan'] = 'aktif';
        $this->attributes['status_pembayaran'] = 'success';
        $this->attributes['waktu_bayar'] = $waktu;
        self::save();
    }
 
    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        $this->attributes['status_pemesanan'] = 'gagal';
        $this->attributes['status_pembayaran'] = 'failed';
        self::save();
    }
 
    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setExpired()
    {
        $this->attributes['status_pemesanan'] = 'gagal';
        $this->attributes['status_pembayaran'] = 'expired';
        self::save();
    }

    public function majikan()
    {
        return $this->belongsTo('App\Majikan', 'majikan_id', 'id');
    }

    public function pekerja()
    {
        return $this->belongsTo('App\Pekerja', 'pekerja_id', 'id');
    }

    public function garansi()
    {
        return $this->hasOne('App\Garansi', 'pemesanan_id_lama', 'id');
    }
}
