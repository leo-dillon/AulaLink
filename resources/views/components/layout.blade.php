<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }} :: AulaLink</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


</head>

<body>
    <div id="app">
        <nav class="">
            
            
               
              <div class="" id="navbarNav">
                <ul class="">
                    <li class="">
                        <x-nav-link route="home.index">
                            Inicio
                        </x-nav-link>
                    </li>
                    

                </ul>
            </div>
                {{-- </div> --}}
              
            </div>
          </nav>
 {{--  Route::currentRouteName() obtiene el nombre de la ruta actual. se compara con "home.index" y si coincide, se agregan las clases --}}
      
        <main class="">
            @if (session()->has('feedback.message'))
              <div class="">
                    {!! session()->get('feedback.message') !!}
              </div>
            @endif


            {{ $slot }}
        </main>
        <footer class="">
            <p>Copyright &copy;<img src="{{asset('images/logo.png')}}" class="ms-2" alt="logo" style="max-height: 25px"> AulaLink</p>
        </footer>
    </div>

    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    
</body>

</html>
