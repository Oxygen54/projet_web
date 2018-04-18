<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;


class ProductController extends Controller
{
    public function getIndex()
    {
      $products = Product::all();
      return view('shop.index', ['products' => $products]);
    }
    public function getAddToCart(Request $request, $id) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('shop.index');
    }

    public function getReduceByOne($id) {

      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

      if (count($cart->items) > 0){
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }

      return redirect()->route('shop.shoppingCart');

    }

    public function getRemoveItem($id) {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0){
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }


      return redirect()->route('shop.shoppingCart');
    }

    public function getCart() {
      if (!Session::has('cart')) {
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
      if (!Session::has('cart')) {
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       $total = $cart->totalPrice;
       return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
          return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_grFj4wxicm9JP7PtWermOGHU');
        try {
           $charge = Charge::create(array(
                  "amount" => $cart->totalPrice * 100,
                  "currency" => "eur",
                  "source" => $request->input('stripeToken'), // obtained with Stripe.js
                  "description" => "Charge test"
                ));


                //Auth::user()->orders()->save('$order');

        } catch (\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('shop.index')->with('success', 'Achat réussi !');
      }

      public function search(Request $request)
          {
            if($request->ajax())
          {
            $output="";
            $products=DB::table('products')->where('title','LIKE','%'.$request->search."%")->get();

          if($products)
          {
              foreach ($products as $key => $product) {
              $output.='<tr>'.
              '<td>'.$product->id.'</td>'.
              '<td>'.$product->imagePath.'</td>'.
              '<td>'.$product->title.'</td>'.
              '<td>'.$product->description.'</td>'.
              '<td>'.$product->price.'</td>'.
              '<td>'.$product->category.'</td>'.
              '</tr>';
            }
              return Response($output);
         }
         }
      }

}
