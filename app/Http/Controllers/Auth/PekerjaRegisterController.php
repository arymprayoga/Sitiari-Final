<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pekerja;
use App\DetailPekerja;
use Illuminate\Support\Facades\Hash;

class PekerjaRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pekerja');
    }

    public function showRegistrationForm()
    {
        return view('auth.pekerja-register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:191|unique:pekerja',
            'password' => 'required|string|min:4',
            // 'status' => 'required|string',
            'name' => 'required|string|max:255',
            'nomorKTP' => 'required|string|max:18',
            'ttl' => 'required',
            'tel' => 'required|string|max:13',
            'alamat' => 'required|string|max:255',
            'keahlian' => 'sometimes|string|max:1000',
            'agama' => 'required|string|max:255',
            'jenisPekerjaan' => 'required',
            'fotoKTP' => 'required',
            'fotoDiri' => 'required'
        ]);

        // $pekerja = Pekerja::create(['name' => $req->name,
        //                             'email' => $req->email,
        //                             'password' => Hash::make($req->password),
        //                             'jenisPekerjaan' => $req->jenisPekerjaan,
        //                         ]);
        // if ($req->hasFile('fotoKTP') && $req->hasFile('fotoDiri')) {
        //     $namaFileKTP = $req->fotoKTP->getClientOriginalName();
        //     $req->fotoKTP->storeAs('public/img/profile/',$namaFileKTP); 
        //     $namaFileDiri = $req->fotoDiri->getClientOriginalName();
        //     $req->fotoDiri->storeAs('public/img/profile/',$namaFileDiri); 
        // }

        // $detail = DetailPekerja::create([
        //     'pekerja_id' => $pekerja->id,
        //     'nomorKTP' => $req->nomorKTP,
        //     'usia' => $req->usia,
        //     'tel' => $req->tel,
        //     'alamat' => $req->alamat,
        //     'keahlian' => $req->keahlian,
        //     'kondisiKhusus' => $req->kondisiKhusus,
        //     'agama' => $req->agama,
        //     'fotoKTP' => $namaFileKTP,
        //     'fotoDiri' => $namaFileDiri
        // ]);

        $hashedPassword = Hash::make($request['password']);
        $request->merge(['password' => $hashedPassword]);
        $pekerja = Pekerja::create($request->all());
        $now = date('Y-m-d');
        $namaFotoDiri = $request->file('fotoDiri')->hashName();
        $namaFotoKTP = $request->file('fotoKTP')->hashName();

        $detail_pekerja = new DetailPekerja([
            'majikan_id' => $pekerja->id,
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

        return redirect()->route('pekerja.login');

    }
}
