<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="antialiased">
    <div class="bg-slate-600 h-[100vh]">
        @if (Route::has('login'))
                <div class="sm:top-0 sm:right-0 p-6 text-right z-10 bg-dark text-white">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-black dark:text-gray-400 dark:hover:text-blue-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-black dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-black dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                <div class="container">
                @if(session()->has('success'))
                    <div class="text-white">
                        {{session('success')}}
                    </div>
                @endif
                @auth
                <div class="w-100 d-flex justify-content-end">
                    <a class="bg-slate-800 text-white p-4 rounded-lg" href="{{route('product.create')}}">Create New Product</a>
                </div>      
                @endauth
                <table class="table table-dark table-striped mt-3">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Description</th>
                        @auth
                        <th>Options</th>
                        <th>Delete</th>
                        @endauth
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>

                            @auth           
                                
                            <td>
                                <a href="{{route('product.edit',['product' => $product])}}">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{route('product.destroy',['product' => $product])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                            
                            @endauth
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>