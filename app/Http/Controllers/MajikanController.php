<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerja;
use App\DetailPekerja;
use App\Majikan;
use App\Pemesanan;
use App\DetailMajikan;
use App\Garansi;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MajikanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:majikan');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $perpanjang = Pemesanan::where('status_pemesanan', 'nonaktif')->count();
        $rating = Pemesanan::where('rating', null)->whereIn('status_pemesanan', ['nonaktif', 'aktif', 'selesai'])->count();
        return view('majikan.dashboard', compact('perpanjang', 'rating'));
    }

    public function showPesanBabysitterPage(){
        $babysitter = Pekerja::where('jenisPekerjaan', 'babysitter')->where('status', 'tersedia')->paginate(4);
        return view('majikan.pesan-babysitter', compact('babysitter'));
    }

    public function showPesanPembantuPage(){
        $pembantu = Pekerja::where('jenisPekerjaan', 'pembantu')->where('status', 'tersedia')->paginate(4);
        return view('majikan.pesan-pembantu', compact('pembantu'));
    }

    public function showPesanPerawatPage(){
        $perawat = Pekerja::where('jenisPekerjaan', 'perawat')->where('status', 'tersedia')->paginate(4);
        return view('majikan.pesan-perawat', compact('perawat'));
    }

    public function showRiwayatPemesananPage(){
        $id = Auth::user()->id;
        // $majikan = Majikan::findOrFail($id);
        $transaksi = Pemesanan::where('majikan_id', $id)->get();
        return view('majikan.riwayat-pemesanan', compact('transaksi'));
        // return $id;
    }

    public function showRatingPekerjaPage(){
        $pesanan = Pemesanan::where('status_pemesanan', 'aktif')->orWhere('status_pemesanan', 'nonaktif')->orWhere('status_pemesanan', 'selesai')->get();
        return view('majikan.rating-pekerja', compact('pesanan'));
    }

    public function showPerpanjangPekerjaPage(){
        $perpanjang = Pemesanan::where('status_pemesanan', 'nonaktif')->get();
        return view('majikan.perpanjang-pekerja', compact('perpanjang'));
    }

    public function ratingPekerja(Request $request){
        $pesanan = Pemesanan::findOrFail($request->id);
        $pesanan->rating = $request->rating;
        $pesanan->save();
        $pekerja = Pekerja::findOrFail($request->pekerja_id);
        $rating = $pekerja->detailPekerja->rating;
        $total = ($rating + $request->rating) / 2;
        $pekerja->detailPekerja()->update(
            ['rating' => $total]
        );
        return back();
        
        // return $total;
    }

    public function perpanjangPekerja(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id);
        $pemesanan->status_pemesanan = 'selesai';
        $pemesanan->save();
        return $pemesanan;
    }

    public function showClaimGaransiPage(){
        $pesanan = Pemesanan::where('status_pemesanan', 'aktif')->where('pertama', 1)->get();
        return view('majikan.refund', compact('pesanan'));
    }

    public function claimGaransi(Request $request){
        $now = date('Y-m-d');
        Garansi::create([
            'pemesanan_id_lama' => $request['pemesanan_id_lama'],
            'alasan' => $request['alasan'],
            'waktu_pengajuan_refund' => $now
        ]);
        $pemesanan = Pemesanan::findOrFail($request['pemesanan_id_lama']);
        $pemesanan->status_pemesanan = 'refund';
        $pemesanan->save();
        return back();
    }

    public function showRiwayatGaransiPage(){
        $pesanan = Pemesanan::where('majikan_id', Auth::user()->id)->where(function($query) { 
            $query->has('garansi');
        })->get();
        return view('majikan.riwayat-garansi', compact('pesanan'));
    }
    public function showEditMajikanPage(){
        $id = Auth::user()->id;
        $majikan = Majikan::where('id', $id)->first();
        return view('majikan.profil', compact('majikan'));
        // return $majikan;
    }
}
