@section('title', 'BDE - Shop')
@extends('layouts.header')
@section('content')

    <div class="flex-center" style="margin-bottom: 15px; margin-top: -10px;">
        <a href="{{ route('shop.shoppingCart')}}" class="btn btn-outline-info btn-md">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
            <span class="badge badge-danger"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} </span>
          </a>
    </div>
  @if(Session::has('success'))
    <div class="row">
      <div class="col-md-4 col-md-4"></div>
         <div id="charge-message" class="alert alert-success">
              {{ Session::get('success') }}
              </div>
         </div>
      </div>
    </div>
  @endif


@foreach($products->chunk(3) as $productChunk)
<div class="row">
@foreach($productChunk as $product)
<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
      <div class="card" style="text-align: center;margin-left: 15px;margin-right: 15px;">
          <div class="card-body">
              <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
              <h3>{{ $product->title }}</h3>
              <p class="description"> {{ $product->description }} </p>
              <div class="clearfix">
                  <div class="pull-left price">{{ $product->price }}€</div>
                  <a href="{{ route('shop.addToCart', ['id' => $product->id])}}"
                     class="btn btn-outline-success pull-right" style="margin-top: 10px;margin-bottom: -5px;"
                     role="button">Add to cart</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
</div>
@endforeach
@endsection
