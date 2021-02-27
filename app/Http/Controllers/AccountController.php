<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ChangePasswordRequest;


use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AccountController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }


    
    public function account()
    {
    	return view('account.index');
    }






    public function editpassword()
    {
    	return view('account.editpassword');
    }





	public function updatepassword(ChangePasswordRequest $request)
    {
    	$route = '/';

    	$oldPassword = $request->old_password;
    	$newPassword = Hash::make($request->password);
    	
    	$user = Auth::user();

		if (Hash::check($oldPassword, $user->password)) {
			
	        $user->password = $newPassword;

	        $user->save();

	        $message = 'Wachtwoord succesvol veranderd';

		} else {
			$route = '/account/verander-wachtwoord';
			$message = 'Wachtwoord is incorrect';
		}

    	return redirect($route)->with('message', $message);
    }

}
