<script setup>
  import TheWelcome from '../components/TheWelcome.vue'
  import MainInstitutionSubjects from '../components/InstitutionComponents/MainInstitutionSubjects.vue'
  import Sidebar from '../components/InstitutionComponents/SideBar.vue'
  import AsignarUsuarioEscuela from '../components/UsuarioConEscuela/AsignarUsuarioEscuela.vue'

  
  const login = localStorage.getItem('token')

</script>

<template>
  <main>
    <div v-if="!login">
      <TheWelcome />
    </div>
    <div v-else class="bg-gray-100 min-h-screen flex">
      <Sidebar/>
      <MainInstitutionSubjects/>
      
    </div>
     <AsignarUsuarioEscuela/>
    
  </main>
</template>
