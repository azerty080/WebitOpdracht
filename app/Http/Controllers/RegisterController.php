<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;


use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function register()
	{
        return view('auth.register');
	}




	public function registersubmit(RegisterRequest $request)
	{
		$user = new User;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        $user->email = $request->email;

        $user->township = strtolower($request->township);
        $user->address = $request->address;

        $user->password = Hash::make($request->password);

        $user->save();

        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        // Log user out if he's logged in
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        Auth::attempt($userdata);

        return redirect('/')->with('message', 'Account succesvol aangemaakt');
	}

}
