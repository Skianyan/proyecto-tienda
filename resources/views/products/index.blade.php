<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap">

    
    <title>Products</title>
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
            color: #fff;
            background-image: url('https://i.redd.it/xqrg0y9cjhd51.jpg');
            background-size: cover;
            background-repeat: no-repeat
            
        }

        @keyframes gradientAnimation {
            100% { background-position: 100%; }
            50% { background-position: 50% ; }
            50% { background-position:  50%; }
        }
        .card-body {
            background: #e9ecef;
            margin: 20px;
            padding: 20px;
            border-radius: 80px;
            text-align: center;
        }
        .card-text {
            font-size: 1.2rem;
            color: #343a40;
            line-height: 1.6;
        }
        .card {
        transition: background-color 0.4s ease, color 0.4s ease;
    }

    .card-body:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: scale(1.05);
        background-color: black;
        color: white;
    }
    .card-body:hover p {
        color: #eeeeee;
    }

    </style>
</head>
<body class="antialiased ">
    
    
    @if (Route::has('login'))
    <div class="sm:top-0 sm:right-0 p-6 text-right z-10 bg-dark">
        @auth
        <div class="flex text-black gap-10 items-center">
            <a href="{{ url('/dashboard') }}" class="text-white bg-slate-600 p-2 rounded-lg font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            <a href="{{ url('/shoppingcart') }}">
                <i class="text-white bg-slate-600 p-2 rounded-lg font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" aria-hidden="true">Shopping Cart</i>
                <span class="">  </span>
            </a>
        </div>
        @else
            <a href="{{ route('login') }}" class="text-xl font-semibold text-black hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-xl ml-4 font-semibold text-black hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
    @endif
    
    <div class="container mt-3">
        @if(session()->has('success'))
            <div class="alert alert-success text-white">
                {{ session('success') }}
            </div>
        @endif

        @role('admin')
            <div class="d-flex justify-content-end mt-4">
                <a class="bg-slate-800 text-white p-4 rounded-lg ml-16" href="{{ route('product.create') }}">Create New Product</a>
            </div>
        @endrole

        <div class="grid grid-cols-2 items-center mx-10 ">
            @foreach ($products as $product)
                <div class="col-md-4 my-4 ">
                    <div class="card text-black ">
                        <div class="flex flex-col card-body p-4 hover:shadow-md border-blue-950 border-2 ">

                            <img class="w-52 self-center " src="{{ asset('images/' . $product->image) }}" />
                            <h5 class=" text-2xl font-bold">{{ $product->name }}</h5>
                            <p class="card-text">Qty: {{ $product->qty }}</p>
                            <p class="card-text">Price: {{ $product->price }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            @auth
                            <a href="{{route('product.addToCart',['id' => $product->id]) }}" class="bg-slate-700 p-2 rounded-lg w-32 self-center" role="button">Add to Cart</a>
                            @endauth
                            @role('admin')
                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary mt-2">Edit</a>
                                <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>