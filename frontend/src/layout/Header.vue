<script setup>
    import { RouterLink } from 'vue-router';
    const login = localStorage.getItem('dataUser')

    const logout = async () => {
        localStorage.clear('dataUser')
        location.href = "/"
    }

</script>
<template>
    <header class=" fixed top-0 left-0 w-full z-50 h-20 ps-8 pe-4 flex items-center justify-between border-b shadow-sm bg-[#1EC199]">
  <RouterLink to="/" class="text-2xl font-bold text-blue-600 hover:text-blue-800 transition">
    <img src="/img/logoAulaLink.png" alt="Aulalink">
  </RouterLink>

  <nav class="flex gap-6 items-center text-sm md:text-base">
    <!-- Mostrar si está logueado -->
    <div v-if="login">
      <RouterLink 
        to="#" 
        @click="logout" 
        class="text-gray-700 hover:text-red-600 transition"
      >
        Cerrar sesión
      </RouterLink>
    </div>

    <!-- Mostrar si NO está logueado -->
    <div v-if="!login">
      <ul class="flex  items-center">
        <!-- <li class=" hover:text-gray-900 text-white font-bold text-lg py-2 px-2  rounded-lg transition-colors duration-200">Sobre Nosotros</li>
        <li class=" hover:text-gray-900 text-white font-bold text-lg py-2 px-2  rounded-lg transition-colors duration-200">Contacto</li> -->
       
        <div class="flex gap-1 items-center">
          <li class="bg-[#003554] hover:bg-[#005072] text-white font-bold text-lg py-2 px-3 rounded-lg transition-colors duration-200">
          <RouterLink to="/iniciar-sesion">
            Iniciar sesión
          </RouterLink>
        </li>
        <li class="bg-amber-400 hover:bg-amber-500 text-white font-bold text-lg py-2 px-3 rounded-lg transition-colors duration-200">
          <RouterLink to="/registrarse" >
            Registrarse
          </RouterLink>
        </li>
        </div>
        
        
      </ul>
    </div>
  </nav>
</header>

</template>