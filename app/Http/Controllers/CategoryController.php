<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;


class CategoryController extends Controller
{
    public function getCategories() {
        $category = Categories::all();
      return view('shop.category', ['category' => $category]);
    }

    public function getProductCategory($idcategories)
    {
        $product = Product::where('catproducts_id', '=', $idcategories)->get();
        return view('shop.category-product', ['product' => $product]);

    }

}
