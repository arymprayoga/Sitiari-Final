<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PekerjaLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:pekerja')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.pekerja-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('pekerja')->attempt($credential, $request->remember)){
            return redirect()->intended(route('pekerja.dashboard'));
        }
        
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('alert', 'Data Tidak Ditemukan');
    }

    public function logout(){
        Auth::guard('pekerja')->logout();
        return redirect('/');
    }
}
