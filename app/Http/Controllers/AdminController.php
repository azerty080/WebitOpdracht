<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Item;

class AdminController extends Controller
{
    public function index()
    {


    	return view('admin.index');
    }




    // Show All Item
    public function showitems()
    {


    	return view('admin.items.show');
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
    public function storeitem()
    {


/*
        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $path = $image->storeAs('uploads', $name, 'public');

                Image::create([
                    'name' => $name,
                    'path' => '/storage/'.$path
                  ]);
            }
        }
*/


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
