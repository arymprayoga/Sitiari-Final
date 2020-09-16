<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerja;
use App\DetailPekerja;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:pekerja');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function showBabysitter(){
        $babysitter = Pekerja::where('jenisPekerjaan', 'babysitter')->where('status', 'tersedia')->paginate(3);
        return view('welcome-babysitter', compact('babysitter'));
    }

    public function showPembantu(){
        $pembantu = Pekerja::where('jenisPekerjaan', 'pembantu')->where('status', 'tersedia')->paginate(3);
        return view('welcome', compact('pembantu'));
        // return $pembantu;
    }

    public function showPerawat(){
        $perawat = Pekerja::where('jenisPekerjaan', 'perawat')->where('status', 'tersedia')->paginate(3);
        return view('welcome-perawat', compact('perawat'));
    }
}
