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
            background-repeat: no-repeat;
        }

        @keyframes gradientAnimation {
            100% {
                background-position: 100%;
            }

            50% {
                background-position: 50%;
            }

            50% {
                background-position: 50%;
            }
        }

        .container {
            width: 100%;
            max-width: 1200px;
            padding: 0 15px;
            box-sizing: border-box;
        }

        .card-body {
            background: #e9ecef;
            margin: 0px;
            padding: 10px;
            border-radius: 11px;
            text-align: center;
            width: 100%; /* Ajustado a ancho completo */
        }

        .card-text {
            font-size: 1rem; /* Ajustado tamaño de fuente */
            color: #343a40;
            line-height: 1.6;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .card-body:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
            background-color: black;
            color: white;
        }

        .card-body:hover p {
            color: #eeeeee;
        }

        /* Media Query para pantallas más pequeñas */
        @media screen and (max-width: 768px) {
            .grid {
                grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
            }
        }
    </style>
</head>

<body class="antialiased ">

    @if (Route::has('login'))
    <div class="sm:top-0 sm:right-0 p-6 text-right z-10 bg-dark bg-black w-full">
        @auth
        <div class="flex text-black gap-4 items-end justify-end">
            <a href="{{ url('/dashboard') }}" class="text-white rounded-lg font-semibold focus:outline focus:outline-2 focus:rounded-sm  hover:text-[#8558ff]  ">Dashboard</a>
            <a href="{{ url('/shoppingcart') }}">
                <i class="text-white rounded-lg font-semibold focus:outline focus:outline-2 focus:rounded-sm  hover:text-[#8558ff]" aria-hidden="true">Shopping Cart</i>
                <span class=""> </span>
            </a>
        </div>
        @else
        <a href="{{ route('login') }}" class="text-1xl font-semibold text-black hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm   ">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="text-1xl ml-4 font-semibold text-black hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm  ">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="container mt-3">
        @if(session()->has('success'))
        <div class="alert alert-success text-white bg-purple-500 w-64 p-2 ml-16 text-center self-center rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        @role('admin')
        <div class="d-flex justify-content-end mt-4">
            <a class="bg-slate-800 text-white p-4 rounded-lg ml-16  hover:bg-[#6351f0] " href="{{ route('product.create') }}">Create New Product</a>
        </div>
        @endrole

        <div class="grid items-center mx-10 mt-6">
            @foreach ($products as $product)
            <div class="my-4">
                <div class="card text-black">
                    <div class="flex flex-col card-body p-4 hover:shadow-md border-blue-950 border-2">

                        <img class="w-99 h-52 self-center" src="{{ asset('images/' . $product->image) }}" />
                        <h5 class="text-2xl font-bold">{{ $product->name }}</h5>
                        <p class="card-text">Qty: {{ $product->qty }}</p>
                        <p class="card-text">Price: {{ $product->price }}</p>
                        <p class="card-text">{{ $product->description }}</p>
                        @auth
                        <a href="{{route('product.addToCart',['id' => $product->id]) }}" class="bg-[#aa62e1] p-2 rounded-lg w-32 self-center hover:bg-[#369fa3]" role="button">Add to Cart</a>
                        @endauth
                        @role('admin')
                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary mt-2 hover:text-[#e9ff5b]">Edit</a>
                        <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger hover:text-[#fa5d5d]">Delete</button>
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