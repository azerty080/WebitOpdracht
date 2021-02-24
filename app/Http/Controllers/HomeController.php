<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use Auth;


class HomeController extends Controller
{
    public function index()
    {
    	// return view('index', compact('bookmarks', 'appointments'));
    	$userId = Auth::id();
		//$userId = Hash::make('secret');
    	//dd($userId);

    	return view('index');
    }
}
