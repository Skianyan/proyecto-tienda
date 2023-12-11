<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ComiXGame</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap">

    <!-- Styles -->
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
            background-size: 88% 88%;
            animation: gradientAnimation 14s ease infinite;
            color: #fff;
            background-image: url('https://i.gifer.com/NvNm.gif');
            
        }

        @keyframes gradientAnimation {
            100% { background-position: 100%; }
            50% { background-position: 50% ; }
            50% { background-position:  50%; }
        }

        .overlay {
         
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.61); /* Ajusta la opacidad aquí */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

    

        .texto h1 {
          
            font-size: 4rem;
            font-weight: 600;
            font-family: 'Times New Roman', Times, serif;
           
           
        }

        .texto h2 {
            font-size: 2rem;
            color: #ffffff;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
           
        }

        .texto a {
            display: inline-block;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            background-color: #8558ff;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        .texto a:hover {
            background-color: #ffffff;
            color: #080810;
        }

        .login-register {
          
            display: flex;
            gap: 20px;
            font-weight: 600;
            color: #fff;
        }

        .login-register a {
            text-decoration: none;
            color: #ffffff;
            transition: color 0.3s;
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #131313;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        .login-register a:hover {
            background: #7500d5;
        }

    </style>
</head>
<body class="antialiased">
    <div class="overlay">
       
        <div class="texto">
            <h1>| ComiXGame |</h1>
            <h2>¡Explora nuestros productos!</h2>
          
        </div>

        <div class="login-register">
            <a  href="{{ url('product') }}">Productos</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
        
    </div>
</body>
</html>