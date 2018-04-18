<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;


class CategoryController extends Controller
{
    public function getCategories() {

        // Retrieve all categories
        $category = Categories::all();

        // Return view
      return view('shop.category', ['category' => $category]);
    }

    public function getProductCategory($idcategories)
    {
        // Retrieve product thanks to the ID
        $product = Product::where('catproducts_id', '=', $idcategories)->get();

        // Return view
        return view('shop.category-product', ['product' => $product]);

    }

}
