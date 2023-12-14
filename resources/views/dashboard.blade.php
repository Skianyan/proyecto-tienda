<style>
   

    .container {
       
        margin: 0 auto;
        padding: 0 20px;
       
    }

    .grid {
        display: grid;
        gap: 20px;
        justify-content: center; /* Centrar horizontalmente */
        align-items: center; /* Centrar verticalmente */
        margin-top: 2rem;
    }

   

    .card-content:hover {
        background-color: #cf00fe;
        color:white;
        
    }  

    .card-content {
        margin:10px;
        padding: 10px;
        background-color: rgb(255, 255, 255);
        color:black;
        border-radius: 6px;
        
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
       
    }

    
    .lol {
        background-image: url('https://i.pinimg.com/originals/1c/e6/3f/1ce63f9442ec9c7391c6d5e569d08cff.gif');
        width:100%;
        height: 44%;
    }

    .button-container {
        display: flex;
        justify-content: center; 
       

    }
    .titulo {
    font-size: 2rem;
    font-family:serif;
    margin: 11px;
    text-align: center; 
}

</style>

<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          
        </h2>
    </x-slot>

    <div class="lol py-12  ">
        <div class="container">
        </div>
    </div>
    
    <div class="grid text-white ">
      <div class='titulo  '></div>
        <div class="button-container">
            <div class="card ">
                
                <div class="card-content ">
                    <a href="{{ url('/') }}" class="card">Home</a>
                </div>
            </div>

            <div >
                <div class="card-content">
                    <a href="{{ url('/product') }}" class="card">Products</a>
                </div>
            </div>

          
        </div>
     
    </div>
</x-app-layout>