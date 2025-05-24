<template>
  <div class="p-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Asignar Usuario a Escuela</h2>

    <form @submit.prevent="asignar">
      <div class="mb-4">
        <label>Usuario ID:</label>
        <input v-model="Usuario_ID" class="border p-2 w-full" type="number" required />
      </div>

      <div class="mb-4 relative">
        <label>Buscar Escuela:</label>
        <input
          v-model="busquedaEscuela"
          @input="buscarEscuelas"
          class="border p-2 w-full"
          type="text"
          autocomplete="off"
          placeholder="Escribí el nombre de la escuela"
        />
        <ul v-if="sugerencias.length" class="absolute z-10 bg-white border w-full">
          <li
            v-for="escuela in sugerencias"
            :key="escuela.ID_Escuela"
            @click="seleccionarEscuela(escuela)"
            class="px-4 py-2 hover:bg-blue-100 cursor-pointer"
          >
            {{ escuela.nombre }}
          </li>
        </ul>
      </div>

      <div class="mb-4">
        <label>ID Escuela Seleccionada:</label>
        <input :value="Escuela_ID" disabled class="border p-2 w-full bg-gray-100" />
      </div>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Asignar</button>
    </form>

    <div class="mt-6">
      <h3 class="font-semibold">Asignaciones existentes:</h3>
      <ul>
        <li v-for="asignacion in asignaciones" :key="asignacion.ID_UserRolEscuela">
          {{ asignacion.usuario?.firstName }} {{ asignacion.usuario?.lastName }} - {{ asignacion.escuela?.nombre }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const Usuario_ID = ref('')
const Escuela_ID = ref('')
const busquedaEscuela = ref('')
const sugerencias = ref([])
const asignaciones = ref([])

const buscarEscuelas = async () => {
  if (busquedaEscuela.value.length < 2) {
    sugerencias.value = []
    return
  }

  try {
    const res = await axios.get(`http://localhost:8000/api/instituciones/buscar?nombre=${busquedaEscuela.value}`)
    sugerencias.value = res.data
  } catch (error) {
    sugerencias.value = []
  }
}

const seleccionarEscuela = (escuela) => {
  Escuela_ID.value = escuela.ID_Escuela
  busquedaEscuela.value = escuela.nombre
  sugerencias.value = []
}

const cargarAsignaciones = async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/usuario-rol-escuela')
    
    
    asignaciones.value = res.data
  } catch (error) {
    console.error('Error al cargar asignaciones', error)
  }
}

const asignar = async () => {
  try {
    await axios.post('http://localhost:8000/api/usuario-rol-escuela', {
      Usuario_ID: parseInt(Usuario_ID.value),
      Escuela_ID: parseInt(Escuela_ID.value),
    })

    Usuario_ID.value = ''
    Escuela_ID.value = ''
    busquedaEscuela.value = ''
    await cargarAsignaciones()
  } catch (error) {
    console.error('Error al asignar usuario a escuela:', error)
    alert('Error al asignar usuario a escuela')
  }
}

onMounted(() => {
  cargarAsignaciones()
})
</script>
