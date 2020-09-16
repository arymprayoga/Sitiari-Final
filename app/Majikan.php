<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Majikan extends Authenticatable
{
    use Notifiable;

    protected $guard = 'majikan';
    protected $table = 'majikan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status',
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

    public function detailMajikan()
    {
        return $this->hasOne('App\DetailMajikan', 'majikan_id', 'id');
    }

    public function pemesanan()
    {
        return $this->hasMany('App\Pemesanan', 'majikan_id', 'id');
    }
}
