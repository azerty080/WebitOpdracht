<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
	public function login()
	{
        if (Auth::check()) {
            // The user is logged in...
            return redirect('/')->with('error', 'Je bent al ingelogd');
        } else {
            return view('auth.login');
        }
	}



	public function loginsubmit(LoginRequest $request)
	{
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if (Auth::attempt($userdata)) {

            if (Auth::user()->role == 'admin') {
                return redirect('/admin')->with('message', 'Je bent ingelogd');
            } else {
                return redirect('/')->with('message', 'Je bent ingelogd');
            }

        } else {        
            return redirect('/login')->with('message', 'Combinate email en wachtwoord onjuist');
        }
	}


	public function logout(Request $request)
    {
        if (Auth::check()) {
            // The user is logged in...
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'Je bent uitgelogd');
        } else {
            return redirect('/')->with('error', 'Je moet eerst ingelogd zijn voordat je kan uitloggen');
        }
    }
}
