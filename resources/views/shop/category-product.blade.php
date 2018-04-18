@section('title', 'Shop - Products')
@extends('layouts.header')
@section('content')

    <div class="flex-center" style="margin-bottom: 15px; margin-top: -10px;">

        <a href="{{ route('shop.add-product') }}" class="btn btn-outline-success btn-md" style="margin-right: 5px;">Add
            a product</a>
        <a href="{{ route('shop.category') }}" class="btn btn-outline-warning btn-md" style="margin-right: 5px;">Filter
            by category</a>
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

    @foreach($product->chunk(3) as $productsChunk)
        <div class="row">
            @foreach($productsChunk as $products)
                <div class="offset-md-2 col-md-3">
                    <div class="thumbnail">
                        <div class="card" style="text-align: center;margin-left: 15px;margin-right: 15px;">
                            <div class="card-body">
                                <img src="{{ $products->imagePath }}" alt="..." class="img-responsive">
                                <div class="caption">
                                    <h3>{{ $products->title }}</h3>
                                    <p class="description">{{ $products->description }}</p>
                                    <div class="clearfix">
                                        <div class="pull-left price"> {{ $products->price }}€</div>
                                        <div class="pull-right">
                                            <a href="{{ route('shop.addToCart', ['id' => $products->id])}}"
                                               class="btn btn-outline-success pull-right" role="button">Add to cart</a>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="idproduit" value="{{ $products->id }}">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

@endsection
