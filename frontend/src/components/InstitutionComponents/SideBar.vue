<script setup>
import axios from 'axios'
import {reactive, onMounted} from 'vue';
const Shool = reactive(
    {
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
onMounted(async () => {
  try {
    const res = await axios.get(`http://127.0.0.1:8000/api/Editar/Institucion/${1}`);
    Object.assign(Shool, res.data);
  } catch (error) {
    console.error("Error al cargar institución", error);
  }
});
</script>

<template>
  <div class="bg-gray-100 min-h-screen flex">
   <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md p-4 space-y-4">
    <h1 class="text-xl font-bold flex items-center gap-2">
      <img src="https://www.gstatic.com/classroom/logo_square_rounded.svg" class="w-6 h-6" alt="">
      {{Shool.Nombre}}
    </h1>
    <nav class="space-y-2">
      <a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
        <span class="material-icons">home</span> Inicio
      </a>
      <a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
        <span class="material-icons">calendar_today</span> Calendar
      </a>
      
      <a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
        <span class="material-icons">settings</span> Ajustes
      </a>
    </nav>
  </aside>

</div>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</template>
