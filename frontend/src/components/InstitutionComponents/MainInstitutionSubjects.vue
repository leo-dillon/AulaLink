<script setup>
import axios from 'axios'
import {reactive, onMounted} from 'vue';


// canviar luego por el sql
 const subjects=[
  { nombre: 'Matemática', profesor: 'Romina Álvarez' },
  { nombre: 'Lengua y Literatura', profesor: 'Martín Gómez' },
  { nombre: 'Historia', profesor: 'Laura Ortega' },
  { nombre: 'Geografía', profesor: 'Daniel Fernández' },
  { nombre: 'Biología', profesor: 'Julia Vidal' },
  { nombre: 'Física', profesor: 'Ticiano Piccino' },
  
  
      ]

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
   const Subject ={}
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
  <!-- Main content -->
  <main class="flex-1 p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Tarjeta de curso -->
      
<div
      v-for="(subject, index) in subjects"
      :key="index"
      class="bg-blue-700 rounded-lg shadow text-white p-4 relative"
    >
      <h2 class="text-lg font-bold">{{ subject.nombre }}</h2>
      <p class="text-sm">Profesor/a: {{ subject.profesor }}</p>
      <img
        :src="`https://ui-avatars.com/api/?name=${encodeURIComponent(subject.nombre)}&size=40&background=0D8ABC&color=fff`"
        class="absolute bottom-3 right-3 rounded-full w-10 h-10"
        alt="Avatar profesor"
      >
    </div>
    </div>
  </main>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</template>
