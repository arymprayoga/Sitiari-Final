<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Pekerja;
use App\DetailPekerja;
use App\Penggajian;
use Auth;

class PekerjaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:pekerja');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $pekerja = Pekerja::where('id', $id)->first();
        return view('pekerja', compact('pekerja'));
        // return $pekerja;
    }

    public function showRiwayatPemesananPage(){
        $id = Auth::user()->id;
        $transaksi = Pemesanan::where('pekerja_id', $id)->get();
        return view('pekerja.riwayat-pemesanan', compact('transaksi'));
    }

    public function showRiwayatPenggajianPage(){
        $id = Auth::user()->id;
        $transaksi = Penggajian::where('pekerja_id', $id)->get();
        return view('pekerja.riwayat-penggajian', compact('transaksi'));
    }

    public function showPengajuanResignPage(){
        $id = Auth::user()->id;
        return view('pekerja.pengajuan-resign', compact('id'));
    }

    public function resign(Request $request){
        $id = Auth::user()->id;
        $pekerja = Pekerja::findOrFail($id);
        $pekerja->status = "resign_pending";
        $pekerja->save();
        return redirect('/pekerja')->with('sukses', 'Permohonan Resign Berhasil');
    }
}
