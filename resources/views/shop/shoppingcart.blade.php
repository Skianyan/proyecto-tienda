@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')

    @if(Session::has('cart'))
    <div class="navbar">
        <a class="navbar-brand" href="{{ url('/product') }}">To Products</a>
    </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item" style="display: flex">
                            <img style="width: 300px; height:auto" src="{{ asset('images/' . $product['item']['image']) }}" />
                            <div style="padding:10px; margin-left: 10px; display:flex; flex-direction:column; gap: 5px">
                                <strong style="font-size: 18px">{{ $product['item']['name']}}</strong>
                                <span class="badge">Quantity: {{$product['qty']}}</span>
                                <span class="label label-success">${{$product['price']}} Pesos</span>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Remove one</a></li>
                                        <li><a href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Remove all</a></li>
                                    </ul>
                            </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="margin-bottom: 20px">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
    <div class="navbar">
        <a class="navbar-brand" href="{{ url('/product') }}">To Products</a>
    </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart</h2>
            </div>
        </div>
    @endif
@endsection