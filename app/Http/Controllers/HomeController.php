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




    public function thankyou()
    {
    	return view('thankyou');
    }




    // Show Single Item
    public function itemdetail($id)
    {
		$item = Item::where('id', $id)->first();

		return view('detail', compact('item'));
    }


    // Show Bids of Item
    public function itembids($id)
    {
        $item = Item::where('id', $id)->first();
        $bids = Bid::where('item_id', $id)->orderBy('price', 'DESC')->get();

        return view('itembids', compact('item', 'bids'));
    }



    // Add a bid to item
    public function addbid($id, AddBidRequest $request)
    {
    	$item = Item::where('id', $id)->first();
    	$user = Auth::user();

    	$highestBid = Bid::where('item_id', $id)->max('price');
    	$userBid = $request->price;


    	if ($highestBid < $userBid) {

	        $bid = new Bid;

	        $bid->price = $userBid;

	        $bid->item()->associate($item);
	        $bid->user()->associate($user);
	        $bid->save();

	        $messageType = 'none';
			$message = 'Je bod is geplaatst';

		} else {
			
			$messageType = 'error';
			$message = 'Je bod moet hoger zijn dan het oude bod';
		}

		return redirect('/bedankt')->with($messageType, $message);
    }





    // Delete a bid to item
    public function removebid($id)
    {
        $messageType = 'success';
		$message = 'Bod verwijderd';

        $userBid = Bid::where('user_id', Auth::id())->where('item_id', $id)->orderBy('price', 'DESC')->first();
        $userBid->delete();

		return redirect('/lot-' . $id)->with($messageType, $message);
		
    }








    // Show All Bids for user
    public function showbids()
    {
		$bids = Bid::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

		return view('bids', compact('bids'));
    }

}
