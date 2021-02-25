<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Item;
use App\Models\Bid;



use App\Http\Requests\AddBidRequest;


class HomeController extends Controller
{
    public function index()
    {
    	// return view('index', compact('bookmarks', 'appointments'));
    	$userId = Auth::id();
		//$userId = Hash::make('secret');
    	//dd($userId);


    	$items = Item::all();

    	return view('index', compact('items'));
    }






    // Show Single Item
    public function itemdetail($id)
    {

		$item = Item::where('id', $id)->first();

		return view('detail', compact('item'));
    }





    // Add a bid to item
    public function addbid($id, AddBidRequest $request)
    {
    	$item = Item::where('id', $id)->first();
    	$user = User::where('id', Auth::id())->first();
		

        $bid = new Bid;

        $bid->price = $request->price;

        $bid->item()->associate($item);
        $bid->user()->associate($user);
        $bid->save();


		return redirect('/lot-' . $id)->with('message', 'Bod geplaatst');
		
    }




}
