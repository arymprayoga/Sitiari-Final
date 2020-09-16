<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;

class MajikanLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:majikan')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.majikan-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('majikan')->attempt($credential, $request->remember)){
            return redirect()->intended(route('majikan.dashboard'));
        }
        
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('alert', 'Data Tidak Ditemukan');
        // return $this->sendFailedLoginResponse($request); 
    }

//     protected function sendFailedLoginResponse(Request $request)
//   {
//     throw ValidationException::withMessages([
//       $this->username() => [trans('auth.failed')],
//     ]);
//   } 

    public function logout(){
        Auth::guard('majikan')->logout();
        return redirect('/');
    }
}
