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

        
		if (session('logged_in')) {
            return redirect('/')->with('error', 'Je bent al ingelogd');
        } else {
            return view('auth.login');
        }


        /*

        if ($user->isAdmin()) {
            return redirect(route('admin-dashboard')); 
           //redirect to desired place since user is admin.
        }

        */
	}




	public function loginsubmit(LoginRequest $request)
	{
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if (Auth::attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            return redirect('/')->with('message', 'Je bent ingelogd');

        } else {        

            // validation not successful, send back to form 
            //return Redirect::to('login');
            return redirect('/login')->with('message', 'Combinate email en wachtwoord onjuist');
        }

	}


	public function logout()
    {
        if (session('logged_in')) {
            session()->forget('logged_in');
            session()->forget('account_data');
            session()->forget('role');

            return redirect('/')->with('message', 'Je bent uitgelogd');
        } else {
            return redirect('/')->with('error', 'Je moet eerst ingelogd zijn voordat je kan uitloggen');
        }
    }
}
