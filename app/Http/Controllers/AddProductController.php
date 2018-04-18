<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddProductController extends Controller

  {

      function formulaire (){

          // Return the view
        return view('shop.add-product');

      }

    public function add(Request $request)
    {
        // Check is the required elements are ok
        $this->validate($request, [
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required']
        ]);

        // Call the class
        $new_product = new \App\Product();

        // Get the values
        $new_product->imagePath = $request['imagePath'];
        $new_product->title = $request['title'];
        $new_product->description = $request['description'];
        $new_product->price = $request['price'];
        $new_product->catproducts_id = $request['catproducts_id'];

        // Save the new product in DB
        $new_product->save();

        // Redirect to Shop
        return redirect('shop');
    }
  }
