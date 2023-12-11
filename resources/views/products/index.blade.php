<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap">

    
    <title>Document</title>
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
            background-image: url('https://i.gifer.com/DbI.gif');
            
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
    <div class="sm:top-0 sm:right-0 p-6 text-right z-10 bg-dark text-white">
        @auth
            <a href="{{ url('/dashboard') }}" class=" font-semibold text-black hover:text-black dark:text-gray-400 dark:hover:text-blue-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
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

        @auth
            <div class="d-flex justify-content-end">
                <a class="bg-slate-800 text-white p-4 rounded-lg" href="{{ route('product.create') }}">Create New Product</a>
            </div>
        @endauth

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4 ">
                    <div class="card text-black ">
                        <div class="card-body p-4 hover:shadow-md">
                            <h5 class=" text-2xl font-bold">{{ $product->name }}</h5>
                            <p class="card-text">Qty: {{ $product->qty }}</p>
                            <p class="card-text">Price: {{ $product->price }}</p>
                            <p class="card-text">{{ $product->description }}</p>

                            @auth
                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary">Edit</a>
                                <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>