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

        return redirect('/')->with('message', 'Account succesvol aangemaakt');
	}



}
