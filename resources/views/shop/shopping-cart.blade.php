@section('title', 'Shop - Shopping Cart')
@extends('layouts.header')
@section('content')

    @if(Session::has('cart'))
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class='list-group-item'>
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-danger"> {{ $product['price'] }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-danger btn-xs" data-toggle="dropdown">Action
                                    <span class="caret"> </span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{ route('shop.reduceByOne', ['id'=> $product['item']['id']]) }}">Reduce by 1</a></li>
                                    <li> <a href="{{ route('shop.remove', ['id'=> $product['item']['id']]) }}">Reduce All</a></li>
                                </ul>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <strong>Total: {{ $totalPrice }} €</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <a href="{{ route('checkout')}}" type="button" class="btn btn-outline-success">Checkout</a>
            </div>

        </div>
    @else
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>No items in Cart !</h2>
            </div>

        </div>

    @endif

@endsection
