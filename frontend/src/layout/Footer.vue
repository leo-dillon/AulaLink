
<template>
<footer class="bg-[#003554] text-white py-10 ">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Logo y descripción -->
    <div class="flex flex-col items-start">
      <h2 class="text-xl font-bold">AulaLink</h2>
      <p class="text-sm mt-2">Conectando la comunidad educativa con tecnología.</p>
    </div>

    <!-- Enlaces útiles -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Enlaces</h3>
      <ul class="space-y-2 text-sm">
        <!-- <li class="hover:text-amber-300 font-bold"><a href="#" >Inicio</a></li>
        <li class="hover:text-amber-300 font-bold"><a href="#" >Beneficios</a></li> -->
        <li class="hover:text-amber-300 font-bold"><RouterLink to="/iniciar-sesion" >
            Iniciar sesión
          </RouterLink></li>        
          <li class="hover:text-amber-300 font-bold"><RouterLink to="/registrarse" >
            Registrarse
          </RouterLink></li>
      </ul>
    </div>

    <!-- Redes sociales -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Seguinos</h3>
      <div class="flex gap-4">
        <a href="#" class="hover:text-amber-300" aria-label="Facebook">
          <i class="fab fa-facebook text-2xl"></i>
        </a>
        <a href="#" class="hover:text-amber-300" aria-label="Instagram">
          <i class="fab fa-instagram text-2xl"></i>
        </a>
        <a href="#" class="hover:text-amber-300" aria-label="Twitter">
          <i class="fab fa-twitter text-2xl"></i>
        </a>
      </div>
    </div>

  </div>

  <!-- Derechos -->
  <div class="text-center text-lg text-gray-300 mt-10">
    <p>© 2025 AulaLink. Todos los derechos reservados.</p>
  </div>
</footer>

</template>