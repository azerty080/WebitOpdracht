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
    	$user = Auth::user();
    	
    	$oldUserBid = Bid::where('user_id', Auth::id())->where('item_id', $id)->first();

    	$highestBid = Bid::where('item_id', $id)->max('price');
    	$userBid = $request->price;


    	if ($highestBid < $userBid) {
    		
			if ($oldUserBid) {

				$oldUserBid->price = $userBid;
		        $oldUserBid->save();

			} else {

		        $bid = new Bid;

		        $bid->price = $userBid;

		        $bid->item()->associate($item);
		        $bid->user()->associate($user);
		        $bid->save();

			}

			$message = 'Bod geplaatst';
			//return redirect('/lot-' . $id)->with('message', 'Bod geplaatst');

		} else {
			dd('bod is lager');
			$message = 'Je bod moet hoger zijn dan het oude bod';
			//return redirect('/lot-' . $id)->with('message', 'Je bod moet hoger zijn dan het oude bod');
		}
	



		return redirect('/lot-' . $id)->with('message', $message);
    }





    // Delete a bid to item
    public function removebid($id)
    {
        $userBid = Bid::where('user_id', Auth::id())->where('item_id', $id)->first();
        $userBid->delete();

		return redirect('/lot-' . $id)->with('message', 'Bod verwijderd');
		
    }



}
