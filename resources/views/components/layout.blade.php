<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }} :: AulaLink</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
     @vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div id="app">
        <nav class="bg-indigo-600 text-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo o Título -->
      <div class="flex-shrink-0 font-bold text-xl">
        AulaLink
      </div>

      <!-- Menú -->
      <div id="navbarNav" class="hidden md:flex">
        <ul class="flex space-x-6">
          @auth
            <ul class="flex space-x-6">
          <li>
            <x-nav-link route="home.index" class="hover:text-indigo-300">
              Sección  1
            </x-nav-link>
          </li>
          <li>
            <x-nav-link route="home.index" class="hover:text-indigo-300">
              Sección  2
            </x-nav-link>
          </li>
          <li>
            <x-nav-link route="home.index" class="hover:text-indigo-300">
              Sección  3
            </x-nav-link>
          </li>
          <!-- Asegurate de tener Alpine.js en tu layout -->
<!-- <script src="//unpkg.com/alpinejs" defer></script> -->

<li class="relative">
  <!-- Botón que abre/cierra el menú -->
  <button id="menuToggle"
          class="flex items-center justify-between w-full font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
    Menú
    <svg class="ml-2 w-4 h-4 transition-transform duration-200" id="arrowIcon"
         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
    </svg>
  </button>

  <!-- Contenedor del menú desplegable -->
  <div id="dropdownMenu"
       class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50 hidden">
    <a href="{{ route('home.index') }}"
       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Inicio</a>

    <a href="{{ route('UserEdit',['id' => Auth::user()->ID_Usuario]) }}"
       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar Perfil</a>

    <form action="{{ route('login.logout') }}" method="POST">
      @csrf
      <button type="submit"
              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
        Cerrar sesión
      </button>
    </form>
  </div>
</li>


        </ul>
         @else
         <ul class="flex space-x-6">
         <li>
            <x-nav-link route="login.index" class="hover:text-indigo-300">
              Iniciar Sesion
            </x-nav-link>
          </li>
          <li>
            <x-nav-link route="register.create" class="hover:text-indigo-300">
              Reguistrarse
            </x-nav-link>
          </li>
        </ul>
          @endauth
          
        
      </div>

      <!-- Botón hamburguesa para mobile (opcional) -->
      <div class="md:hidden">
        <button id="menu-button" class="focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>

<script>
  const btn = document.getElementById('menu-button');
  const nav = document.getElementById('navbarNav');
  btn.addEventListener('click', () => {
    nav.classList.toggle('hidden');
  });
</script>

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
<div class="flex items-center justify-center space-x-2 py-4 bg">
    <p class="text-gray-600 flex items-center">
        &copy; 
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="mx-2" style="max-height: 25px;">
         AulaLink
    </p>
</div>
        </footer>
    </div>

    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    
</body>

</html>

<script>
  const toggle = document.getElementById('menuToggle');
  const menu = document.getElementById('dropdownMenu');
  const arrow = document.getElementById('arrowIcon');

  document.addEventListener('click', (e) => {
    const isClickInside = toggle.contains(e.target) || menu.contains(e.target);

    if (!isClickInside) {
      menu.classList.add('hidden');
      arrow.classList.remove('rotate-180');
    }
  });

  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
  });
</script>
