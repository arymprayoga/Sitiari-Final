<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Majikan;
use App\DetailMajikan;
use Illuminate\Support\Facades\Hash;

class MajikanRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:majikan');
    }

    public function showRegistrationForm()
    {
        return view('auth.majikan-register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:191|unique:pekerja',
            'password' => 'required|string|min:4',
            // 'status' => 'required|string',
            'name' => 'required|string|max:255',
            'nomorKTP' => 'required|string|max:18',
            'tel' => 'required|string|max:13',
            'alamat' => 'required|string|max:255',
            'fotoKTP' => 'required',
            'fotoDiri' => 'required'
        ]);

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

        return redirect()->route('majikan.login');

    }
}
