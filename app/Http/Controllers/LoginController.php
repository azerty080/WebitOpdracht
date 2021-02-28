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
            // The user is logged in
            return redirect('/')->with('info', 'Je bent al ingelogd');
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
            $messageType = 'success';
            $message = 'Je bent ingelogd';
            $redirectLink = '/';
        } else {
            $redirectLink = '/login';
            $messageType = 'error';
            $message = 'Combinate email en wachtwoord onjuist';
        }

        return redirect($redirectLink)->with($messageType, $message);
	}


	public function logout(Request $request)
    {
        if (Auth::check()) {
            // The user is logged in...
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            $messageType = 'success';
            $message = 'Je bent uitgelogd';
        } else {
            $messageType = 'error';
            $message = 'Je moet eerst ingelogd zijn voordat je kan uitloggen';
        }

        return redirect('/')->with($messageType, $message);
    }
}
