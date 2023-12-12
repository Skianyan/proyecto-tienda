<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div class=" bg-gray-800 sm:top-0 sm:right-0 p-6 text-right z-10 bg-dark text-white">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-black dark:text-gray-400 dark:hover:text-blue-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-white hover:text-black dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-black dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
        @if($errors->any())
        <ul>
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
                
            @endforeach
        </ul>
        @endif
    </div>
    <form class="relative space-y-2  sm:flex sm:flex-col sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center  bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="sm:flex sm:flex-col">
            <label class="text-white" for="Name">Name</label>
            <input class="p-2" type="text" name="name" placeholder="Name">
        </div>
        <div class="sm:flex sm:flex-col">
            <label class="text-white" for="Qty">Quantity</label>
            <input class="p-2" type="text" name="qty" placeholder="Quantity">
        </div>
        <div class="sm:flex sm:flex-col">
            <label class="text-white" for="Price">Price</label>
            <input class="p-2" type="text" name="price" placeholder="Price" >
        </div>
        <div class="sm:flex sm:flex-col">
            <label class="text-white" for="Description">Description</label>
            <input class="p-2" type="text" name="description" placeholder="Description">
        </div>
        <div class="sm:flex sm:flex-col">
            <label class="text-white" for="image" >Image:</label>
            <input class="p-2" type="file" name="image" accept="image/png, image/jpeg, image/jpg, image/svg" required>
        </div>
            <input class="bg-slate-600 text-white p-4 rounded-lg" type="submit" value="Save Product">
    </form>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>