<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddProductController extends Controller

  {

      function formulaire (){

        return view('shop.add-product');

      }
//    function add ()
//    {
//      request()->validate ([
//
//        'title' => ['required'],
//        'price' => ['required'],
//        'description' => ['required']
//      ]);
//
//      $new_product = new \App\Product();
//      $new_product->imagePath = request('imagePath');
//      $new_product->title = request('title');
//      $new_product->description = request('description');
//      $new_product->price = request('price');
//      $new_product->catproducts_id = request('catproducts_id');
//
//      $new_product->save();
//
//      return redirect('shop');
//    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required']
        ]);
        $new_product = new \App\Product();
        $new_product->imagePath = $request['imagePath'];
        $new_product->title = $request['title'];
        $new_product->description = $request['description'];
        $new_product->price = $request['price'];
        $new_product->catproducts_id = $request['catproducts_id'];

        $new_product->save();

        return redirect('shop');
    }
  }
