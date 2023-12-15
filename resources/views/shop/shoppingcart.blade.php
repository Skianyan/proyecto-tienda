@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    @if(Session::has('cart'))

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            background-size: 100% 100%;
            animation: gradientAnimation 14s ease infinite;
            background: #ffffff;
            background-size: cover;
            background-repeat: no-repeat;
        }

      

        .lista {
     
            color: #000000;
            font-size: 22px;
            font-family: 'Arial', sans-serif; 
            font-weight: bold;
            margin: 10px 0;
        }
        

        .resultado{
            color: #000000;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }
      

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            justify-content: center;
        }

      

        /* Media Query para pantallas más pequeñas */
        @media screen and (max-width: 768px) {
            .grid {
                grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
            }
        }
    </style>
    <div class="navbar">
        <a class="navbar-brand" href="{{ url('/product') }}">Dashboard</a>
    </div>
    <div class="row">
        
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        
        <ul class="list-group">
            <h5 class="resultado">CARRITO DE COMPRAS</h5>
            <div class="general">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <div class="sera row">
                            <div class="vida col-sm-6">
                                <div class="imagen">
                                    <img class="w-99 h-52 self-start" src="{{ asset('images/' . $product['item']['image']) }}" />
                                </div>
                            </div>
                                <div class="final col-md-6">
                                    <div class="lista">
                       
                                     <strong class="text-xl">{{ $product['item']['name']}}</strong>
                      
                                    </div>
                                <span class="badge">Cantidad: {{$product['qty']}}</span><br>
                                <span class="label label-success">$: {{$product['price']}}</span><br>
                                     <div class="btn-group" style="margin-top: 10px;">
                                     <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                     <ul class="dropdown-menu">
                                        <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                                      <li><a href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
                                     </ul>
                                     </div>
                                </div>

                        </div>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>
    
</div>
        <div class="resultado">
        <div class="row">
            <div class=" col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 ">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
        </div>
    @else
    <div class="navbar">
        <a class="navbar-brand" href="{{ url('/product') }}">Dashboard</a>
    </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Tu carrito está vacío</h2>
            </div>
        </div>
    @endif
@endsection