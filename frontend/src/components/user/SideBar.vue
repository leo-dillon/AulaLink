<script setup>
// defineProps({
//     'userSchool': escuela
//   })
//   console.log(userSchool) 

  import axios from 'axios'
  import {reactive, onMounted, inject} from 'vue';
  import { RouterLink } from 'vue-router';

  const Shool = reactive({
    Nombre:"",
    CUE:"",
    Direccion:"",
    Localidad:"",
    Provincia:"",
    Telefonos:"",
    Emails:"",
    Nivel:"",
    Tipo:"",
    // Usuario_ADM:"1",
  })
      //const id = route.params.id; // El ID viene desde la URL
  const id_institution = 1; // ⬆⬆El ID viene desde la URL
  const userData = inject('userData')
  const userName = userData.firstName + ' ' + userData.lastName

  onMounted(async () => {
    try {
      const res = await axios.get(`http://127.0.0.1:8000/api/Editar/Institucion/${id_institution}`);
      Object.assign(Shool, res.data);
    } catch (error) {
      console.error("Error al cargar institución", error);
    }
  });
</script>

<template>
  <div class="bg-gray-100 min-h-screen flex">
   <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md">
    <div class="p-4">
      <h1 class="text-xl font-bold flex items-center gap-2">
        <img :src="`https://ui-avatars.com/api/?name=${encodeURIComponent(userName)}&size=40&background=0D8ABC&color=fff`" class="w-6 h-6 rounded-lg" alt="">
        {{userName}}
      </h1>
    </div>
    <nav class="">
      <RouterLink 
        to="/user/" 
        class="flex items-center gap-3 rounded hover:bg-gray-100 p-4"
      >
        <span class="material-icons">home</span> Inicio
      </RouterLink>
      
      <RouterLink 
        to="/user/calendario" 
        class="flex items-center gap-3 rounded hover:bg-gray-100 p-4"
      >
        <span class="material-icons">calendar_today</span> Calendar
      </RouterLink>
      
      <RouterLink to="/user/escuela" class="flex items-center gap-3 rounded hover:bg-gray-100 p-4">
        <span class="material-icons">school</span>
        Escuela
      </RouterLink>
      
      <RouterLink to="/user/editar_escuela/${id_institution}" class="flex items-center gap-3 rounded hover:bg-gray-100 p-4">
        <span class="material-icons">settings</span> Ajustes
      </RouterLink>

    </nav>
  </aside>

</div>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</template>
