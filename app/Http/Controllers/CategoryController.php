<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;


class CategoryController extends Controller
{
    public function getCategories() {
      $category = Category::all();
      return view('shop.category', ['category' => $category]);
    }

    public function getProductCategory($idcategory) {
      $products = Product::where('catproducts_id', '=' , $idcategory)->get();
      return view('shop.category-product', ['products' => $products]);

    }

}
