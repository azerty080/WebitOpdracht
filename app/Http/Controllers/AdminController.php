<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\AddItemRequest;

use App\Models\Item;
use App\Models\Image;



class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function index()
    {


    	return view('admin.index');
    }




    // Show All Item
    public function showitems()
    {
        $items = Item::all();

    	return view('admin.items.show', compact('items'));
    }





    // Show Single Item
    public function itemdetail(Item $item)
    {


    	return view('admin.items.detail');
    }




    // Add Item Form
    public function additem()
    {

        return view('admin.items.add');
    }


    // Store Item in DB
    public function storeitem(AddItemRequest $request)
    {
        
        $item = new Item;

        $item->title = $request->title;
        $item->description = $request->description;

        $item->save();



        $uploadedImages = $request->images;

        foreach($uploadedImages as $uploadedImage) {
            $imageName = time().'.'.$uploadedImage->getClientOriginalName();

            $uploadedImage->storeAs('public/images', $imageName);
            //$uploadedImage->move(public_path().'/images/', $imageName);  


            $image = new Image;

            $image->name = $imageName;

            $image->path = '/storage/images/' . $imageName;
            
            
            $image->item()->associate($item);
            $image->save();

        }


        return redirect('/admin/items')->with('message', 'Voorwerp succesvol toegevoegd');
    }




    // Edit Item Form
    public function edititem()
    {


    	return view('admin.items.edit');
    }



    // Update Item in DB
    public function updateitem()
    {


        return view('admin.items.edit');
    }





    // Remove Item
    public function removeitem()
    {


        return redirect('/admin/items')->with('message', 'Voorwerp succesvol verwijderd');
    }




}
