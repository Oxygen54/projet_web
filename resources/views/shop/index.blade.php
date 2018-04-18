@section('title', 'BDE - Shop')
@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">

            <li>
                <a href="{{ route('shop.shoppingCart')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                    <span class="badge badge-danger"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} </span>
                </a>
            </li>
        </ul>

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
      <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
      <div class="caption">
          <h3>{{ $product->title }}</h3>
          <p class="description"> {{ $product->description }} </p>
          <div class="clearfix">
              <div class="pull-left price">{{ $product->price }}€</div>
              <a href="{{ route('shop.addToCart', ['id' => $product->id])}}" class="btn btn-outline-success pull-right"
                 role="button">Add to cart</a>
          </div>
      </div>
  </div>
</div>
@endforeach
</div>
@endforeach
@endsection
