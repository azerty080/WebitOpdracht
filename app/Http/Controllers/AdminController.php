<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\AddItemRequest;
use App\Http\Requests\UpdateItemRequest;

use App\Models\Item;
use App\Models\Image;
use App\Models\Bid;

use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    


    // Show All Item
    public function showitems()
    {
        $items = Item::all();

    	return view('admin.items.show', compact('items'));
    }





    // Show Single Item
    public function itemdetail($id)
    {
        $item = Item::findOrFail($id);

    	return view('admin.items.detail', compact('item'));
    }




    // Show Bids of Item
    public function itembids($id)
    {
        $item = Item::findOrFail($id);
        $bids = Bid::where('item_id', $id)->orderBy('price', 'DESC')->get();

        return view('admin.items.bids', compact('item', 'bids'));
    }




    // Add Item Form
    public function additem()
    {
        return view('admin.items.add');
    }


    // Store Item in DB
    public function storeitem(AddItemRequest $request)
    {
        $messageType = 'success';
        $message = 'Voorwerp succesvol toegevoegd';
        
        $item = new Item;

        $item->title = $request->title;
        $item->description = $request->description;

        $item->save();



        $uploadedImages = $request->images;

        foreach($uploadedImages as $uploadedImage) {
            $imageName = time().'.'.$uploadedImage->getClientOriginalName();

            $uploadedImage->storeAs('public/images', $imageName);


            $image = new Image;

            $image->name = $imageName;

            $image->path = '/storage/images/' . $imageName;
            
            
            $image->item()->associate($item);
            $image->save();
        }


        return redirect('/admin/items')->with($messageType, $message);
    }




    // Edit Item Form
    public function edititem($id)
    {
        $item = Item::findOrFail($id);

        return view('admin.items.edit', compact('item'));
    }







    // Update Item in DB
    public function updateitem($id, UpdateItemRequest $request)
    {
        $messageType = 'success';
        $message = 'Voorwerp succesvol aangepast';

        $item = Item::findOrFail($id);

        // Delete old images marked for deletion
        $imagesToDeleteIds = $request->old_images_to_delete;

        $imagesToDelete = Image::where('item_id', $id)->whereNotIn('id', $imagesToDeleteIds);

        foreach ($imagesToDelete->get() as $image) {
            Storage::delete('public/images/' . $image->name);
        }

        $imagesToDelete->delete();




        // Add new images
        $uploadedImages = $request->images;

        if (!is_null($uploadedImages)) {
            foreach($uploadedImages as $uploadedImage) {
                $imageName = time().'.'.$uploadedImage->getClientOriginalName();

                $uploadedImage->storeAs('public/images', $imageName);


                $image = new Image;

                $image->name = $imageName;

                $image->path = '/storage/images/' . $imageName;
                
                
                $image->item()->associate($item);
                
                $image->save();
            }
        }



        // Edit item data
        $item->title = $request->title;
        $item->description = $request->description;

        $item->save();


        return redirect('/admin/items')->with($messageType, $message);
    }









    // Remove Item
    public function removeitem($id)
    {
        $messageType = 'success';
        $message = 'Voorwerp succesvol verwijderd';

        $item = Item::where('id', $id);
        $images = Image::where('item_id', $id);
        $bids = Bid::where('item_id', $id);

        foreach ($images->get() as $image) {
            Storage::delete('public/images/' . $image->name);
        }

        $item->delete();
        $images->delete();
        $bids->delete();

        return redirect('/admin/items')->with($messageType, $message);
    }



}
