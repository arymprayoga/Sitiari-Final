<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pekerja extends Authenticatable
{
    use Notifiable;

    protected $guard = 'pekerja';
    protected $table = 'pekerja';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'jenisPekerjaan', 'gaji'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function detailPekerja()
    {
        return $this->hasOne('App\DetailPekerja', 'pekerja_id', 'id');
    }

    public function pemesanan()
    {
        return $this->hasMany('App\Pemesanan', 'pekerja_id', 'id');
    }

    public function penggajian(){
        return $this->hasMany('App\Penggajian', 'pekerja_id', 'id');
    }

    public function setBekerja()
    {
        $this->attributes['status'] = 'bekerja';
        self::save();
    }

    public function setTersedia()
    {
        $this->attributes['status'] = 'tersedia';
        self::save();
    }
}
