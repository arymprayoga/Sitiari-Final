<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggajian;
use App\User;
use App\Pekerja;
use App\DetailPekerja;
use App\Majikan;
use App\DetailMajikan;
use App\Pemesanan;
use App\Garansi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pekerja = Pekerja::where('status','tersedia')->count();
        $pendaftar = Pekerja::where('status','pending')->count();
        $majikan = Majikan::where('status','aktif')->count();
        return view('home', compact('pekerja', 'pendaftar', 'majikan'));
    }

    // public function testing()
    // {
    //     $pekerja = Pekerja::();
    //     return $pekerja;
    // }

    public function showDaftarAdminPage(){
        $admin = User::paginate(5);
        return view('admin.daftar-admin', compact('admin'));
    }

    // public function stubCreate($tambahAdmin){
    //     return $tambahAdmin;
    //   }

    public function tambahAdmin(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:4'
        ]);
        $hashedPassword = Hash::make($request['password']);
        $request->merge(['password' => $hashedPassword]);
        User::create($request->all());
        return back();
    }
  
    // public function tambahAdmin(Request $request){
    //     $this->validate($request,[
    //         'name' => 'required|string|max:191',
    //         'email' => 'required|string|email|max:191|unique:users',
    //         'password' => 'required|string|min:4'
    //     ]);
    //     $hashedPassword = Hash::make($request['password']);
    //     $request->merge(['password' => $hashedPassword]);
    //     $admin = $this->stubCreate('Add Success');
    //     return compact('admin');
    // }

    public function editAdmin(Request $request){
        $user = User::findOrFail($request->id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
        ]);      
        if($request->password){
            $hashedPassword = Hash::make($request['password']);
            $request->merge(['password' => $hashedPassword]);
        } else{
            $request->merge(['password' => $user->password]);
        }      
        $user->update($request->all());
        return back();
    }

    public function deleteAdmin(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        return back();
    }

    public function searchAdmin(Request $request){
        $admin= User::where('name', 'like', '%'.$request->table_search.'%')->paginate(20);
        return view('admin.daftar-admin', compact('admin'));
    }

    public function showDaftarMajikanPage(){
        $majikan = Majikan::paginate(5);
        return view('admin.daftar-majikan', compact('majikan'));
    }

    public function tambahMajikan(Request $request){
        // $majikan = Majikan::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'status' => $request['status']
        // ]);
        $hashedPassword = Hash::make($request['password']);
        $request->merge(['password' => $hashedPassword]);
        $majikan = Majikan::create($request->all());
        $now = date('Y-m-d');
        $namaFotoDiri = $request->file('fotoDiri')->hashName();
        $namaFotoKTP = $request->file('fotoKTP')->hashName();

        $detail_majikan = new DetailMajikan([
            'majikan_id' => $majikan->id,
            'nomorKTP' => $request['nomorKTP'],
            'tel' => $request['tel'],
            'alamat' => $request['alamat'],
            'fotoKTP' => $namaFotoKTP,
            'fotoDiri' => $namaFotoDiri,
            'tanggalMasuk' => $now,
        ]);
        // $request->merge(['fotoDiri' => $namaFotoDiri, 'fotoKTP' => $namaFotoKTP]);

        // $detail_majikan= new DetailMajikan($request->all());
        
        $majikan->detailMajikan()->save($detail_majikan);

        $path = $request->file('fotoDiri')->store('public/img/profile');
        $path2 = $request->file('fotoKTP')->store('public/img/profile');       

        return back();
    }

    public function editMajikan(Request $request){
        $majikan = Majikan::findOrFail($request->id);
        $hashedPassword = Hash::make($request['password']);
        $request->merge(['password' => $hashedPassword]);
        $majikan->update($request->all());
        $namaFotoDiri = $request->file('fotoDiri')->hashName();
        $namaFotoKTP = $request->file('fotoKTP')->hashName();
        $detail_majikan = [
            'majikan_id' => $majikan->id,
            'nomorKTP' => $request['nomorKTP'],
            'tel' => $request['tel'],
            'alamat' => $request['alamat'],
            'fotoKTP' => $namaFotoKTP,
            'fotoDiri' => $namaFotoDiri,
        ];
        $majikan->detailMajikan()->update($detail_majikan);
        $path = $request->file('fotoDiri')->store('public/img/profile');
        $path2 = $request->file('fotoKTP')->store('public/img/profile');   
        return back();
    }

    public function deleteMajikan(Request $request){
        $majikan = Majikan::findOrFail($request->id);
        $majikan->detailMajikan()->delete();
        $majikan->delete();
        return back();
    }

    public function searchMajikan(Request $request){
        $majikan= Majikan::where('name', 'like', '%'.$request->table_search.'%')->paginate(20);
        return view('admin.daftar-majikan', compact('majikan'));
    }

    public function showDaftarPekerjaPage(){
        $pekerja = Pekerja::paginate(5);
        return view('admin.daftar-pekerja', compact('pekerja'));
    }

    public function tambahPekerja(Request $request){
        // $majikan = Majikan::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'status' => $request['status']
        // ]);
        $hashedPassword = Hash::make($request['password']);
        $request->merge(['password' => $hashedPassword]);
        $pekerja = Pekerja::create($request->all());
        $now = date('Y-m-d');
        $namaFotoDiri = $request->file('fotoDiri')->hashName();
        $namaFotoKTP = $request->file('fotoKTP')->hashName();

        $detail_pekerja = new DetailPekerja([
            'pekerja_id' => $pekerja->id,
            'nomorKTP' => $request['nomorKTP'],
            'tel' => $request['tel'],
            'ttl' => $request['ttl'],
            'alamat' => $request['alamat'],
            'keahlian' => $request['keahlian'],
            'agama' => $request['agama'],
            'rating' => $request['rating'],
            'tanggalMasuk' => $now,
            'fotoKTP' => $namaFotoKTP,
            'fotoDiri' => $namaFotoDiri,
        ]);
        // $request->merge(['fotoDiri' => $namaFotoDiri, 'fotoKTP' => $namaFotoKTP]);

        // $detail_majikan= new DetailMajikan($request->all());
        
        $pekerja->detailPekerja()->save($detail_pekerja);

        $path = $request->file('fotoDiri')->store('public/img/profile');
        $path2 = $request->file('fotoKTP')->store('public/img/profile');       

        return back();
    }

    public function editPekerja(Request $request){
        $pekerja = Pekerja::findOrFail($request->id);
        $hashedPassword = Hash::make($request['password']);
        $request->merge(['password' => $hashedPassword]);
        $pekerja->update($request->all());
        $namaFotoDiri = $request->file('fotoDiri')->hashName();
        $namaFotoKTP = $request->file('fotoKTP')->hashName();
        $detail_pekerja = [
            'pekerja_id' => $pekerja->id,
            'nomorKTP' => $request['nomorKTP'],
            'tel' => $request['tel'],
            'ttl' => $request['ttl'],
            'alamat' => $request['alamat'],
            'keahlian' => $request['keahlian'],
            'agama' => $request['agama'],
            'rating' => $request['rating'],
            'fotoKTP' => $namaFotoKTP,
            'fotoDiri' => $namaFotoDiri,
        ];
        $pekerja->detailPekerja()->update($detail_pekerja);
        $path = $request->file('fotoDiri')->store('public/img/profile');
        $path2 = $request->file('fotoKTP')->store('public/img/profile');   
        return back();
    }

    public function deletePekerja(Request $request){
        $pekerja = Pekerja::find($request->id);
        if($pekerja){
            $pekerja->detailPekerja()->delete();
            $pekerja->delete();
            return back()->with('sukses', 'Penghapusan Berhasil');           
        }        
        else{
            return back()->with('alert', 'Data Tidak Ditemukan');
        }

    }

    public function searchPekerja(Request $request){
        $pekerja= Pekerja::where('name', 'like', '%'.$request->table_search.'%')->paginate(20);
        return view('admin.daftar-pekerja', compact('pekerja'));
    }

    public function showPendaftaranPekerjaPage(){
        $pekerja = Pekerja::where('status', 'pending')->get();
        return view('admin.pendaftaran-pekerja', compact('pekerja'));
    }

    public function terimaPekerja(Request $request){
        $pekerja = Pekerja::find($request->id);
        if($pekerja){
            $pekerja->status = 'tersedia';
            $pekerja->save();
            return back()->with('sukses', 'Konfirmasi Berhasil');
        } else{
            return back()->with('alert', 'Terjadi Kesalahan');
        }        
    }

    public function tolakPekerja(Request $request){
        $pekerja = Pekerja::findOrFail($request->id);
        $pekerja->detailPekerja()->delete();
        $pekerja->delete();
        return back();        
    }

    public function showPenggajianPekerjaPage(){
        $penggajian = Penggajian::where('status_penggajian', 'belum')->get();
        return view('admin.penggajian-pekerja', compact('penggajian'));
    }

    public function gajiPekerja(Request $request){
        $penggajian = Penggajian::findOrFail($request->id);
        $penggajian->setBayar();
        return back();
    }

    public function showRekapGajiPage(){
        $gaji = Penggajian::where('status_penggajian', 'sudah')->get();
        return view('admin.rekap-gaji', compact('gaji'));
    }

    public function showResignPekerjaPage(){
        $pekerja = Pekerja::where('status', 'resign_pending')->get();
        return view('admin.resign-pekerja', compact('pekerja'));
    }

    public function resignPekerja(Request $request){
        $pekerja = Pekerja::findOrFail($request->id);
        $pekerja->status = 'resign';
        $pekerja->save();
        return back();
    }

    public function tolakResignPekerja(Request $request){
        $pekerja = Pekerja::findOrFail($request->id);
        $pekerja->status = 'tersedia';
        $pekerja->save();
        return back();
    }

    public function showDaftarPemesananPage(){
        // $pesanan = Pemesanan::where('status_pemesanan', 'sukses')->orWhere('status_pemesanan', 'nonaktif')->paginate(20);
        $pesanan = Pemesanan::get();
        
        // return $pesanan[2]->pemesanan;
        // return $pesanan;
        return view('admin.daftar-pemesanan', compact('pesanan'));
    }

    public function MyAction(){
        $pesanan = Pemesanan::where('waktu_bayar', '<=', Carbon::now()->subDays(30))->update(['status_pemesanan' => 'nonaktif']);
        // dd($pesanan);
    }

    public function transaksiPekerja(Request $request){
        $pekerja = Pekerja::findOrFail($request->id_pekerja);
        $transaksi = $pekerja->pemesanan()->get();
        return view('admin.transaksi-pekerja', compact('transaksi'));
        // return $transaksi;
    }

    public function transaksiMajikan(Request $request){
        $majikan = Majikan::findOrFail($request->id_majikan);
        $transaksi = $majikan->pemesanan()->get();
        return view('admin.transaksi-majikan', compact('transaksi'));
        // return $transaksi;
    }

    public function showClaimGaransiPage(){
        $pesanan = Pemesanan::where('status_pemesanan', 'refund')->get();
        return view('admin.claim-garansi', compact('pesanan'));
    }
    public function showRiwayatClaimGaransiPage(){
        $pesanan = Garansi::get();
        return view('admin.riwayat-claim-garansi', compact('pesanan'));
    }

    public function tolakGaransi(Request $request){
        $now = date('Y-m-d');
        $pesanan = Pemesanan::findOrFail($request->id);
        $pekerja = Pekerja::findOrFail($pesanan->pekerja_id);
        $pekerja->status = 'tersedia';
        $pekerja->save();
        $pesanan->status_pemesanan = 'selesai';
        $pesanan->save();
        $pesanan->garansi()->update([
            'status_refund' => 'ditolak',
            'waktu_konfirmasi_refund' => $now,
        ]);
        return back();
    }

    public function terimaGaransi(Request $request){
        $now = date('Y-m-d');
        $id_baru = $request->id_baru;
        $id_lama = $request->id_lama;
        $id_majikan = $request->id_majikan;
        $id_pesanan_lama = $request->id_pesanan;

        $pekerja_baru = Pekerja::where('id', $id_baru)->first();
        $pekerja_lama = Pekerja::where('id', $id_lama)->first();
        $pesanan_lama = Pemesanan::where('id', $id_pesanan_lama)->first();

        $jumlahBayar = $pekerja_baru->gaji;
        $pesanan_baru = Pemesanan::create([
            'majikan_id' => $id_majikan,
            'pekerja_id' => $id_baru,
            'jumlah_bayar' => $jumlahBayar,
            'waktu_pesan' => $now,
            'waktu_bayar' => $now,
            'status_pemesanan' => 'aktif',
            'status_pembayaran' => 'success',
            'pertama' => '0',
          ]);
          $pesanan_lama->garansi()->update([
            'status_refund' => 'disetujui',
            'waktu_konfirmasi_refund' => $now,
            'pemesanan_id_baru' => $pesanan_baru->id,
            ]);
            
          $pesanan_lama->status_pemesanan = 'selesai';
          $pesanan_lama->save();
          $bayaran = ($pesanan_baru->jumlah_bayar * 10) / 100;
          $penggajian = Penggajian::create([
            'pekerja_id' => $pesanan_baru->pekerja_id,
            'waktu_pemesanan' => $pesanan_baru->waktu_pesan,
            'jumlah_bayar' => $pesanan_baru->jumlah_bayar - $bayaran,                
        ]);

        $pekerja_baru->setBekerja();
        $pekerja_lama->setTersedia();

        $pesanan = Pemesanan::where('status_pemesanan', 'refund')->get();
        return view('admin.claim-garansi', compact('pesanan'))->with('sukses', 'Konfirmasi Resign Berhasil');
    }

    public function showTerimaGaransiPage(Request $request){
        $pemesanan = Pemesanan::where('id', $request->id)->first();
        $pekerjaa = Pekerja::where('id', $pemesanan->pekerja_id)->first();
        $status = $pekerjaa->jenisPekerjaan;
        $pekerja = Pekerja::where('jenisPekerjaan', $status)->where('status', 'tersedia')->get();
        $idPekerjaLama = $pemesanan->pekerja_id;
        $idMajikan = $pemesanan->majikan_id;
        $idPesanan = $pemesanan->id;
        return view('admin.pilih-pekerja', compact('pekerja', 'idPekerjaLama', 'idMajikan', 'idPesanan'));
        // return $idPekerjaLama;
    }   

    public function showBlacklistPekerjaPage(){
        $pekerja = Pekerja::where('status', '!=' , 'blacklist')->paginate(5);
        return view('admin.blacklist-pekerja', compact('pekerja'));
    }

    public function blacklistPekerja(Request $request){
        $pekerja = Pekerja::findOrFail($request->id);
            $pekerja->status = 'blacklist';
            $pekerja->save();
            return back();
    }

    public function showBlacklistMajikanPage(){
        $majikan = Majikan::where('status', '!=' , 'blacklist')->paginate(5);
        return view('admin.blacklist-majikan', compact('majikan'));
    }

    public function blacklistMajikan(Request $request){
            $majikan = Majikan::findOrFail($request->id);
            $majikan->status = 'blacklist';
            $majikan->save();
            return back();
    }
}
