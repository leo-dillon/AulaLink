<template>
  <div class="p-6 max-w-xl mx-auto bg-white shadow-lg rounded-xl">
  <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Asignar Usuario a Escuela</h2>

  <form @submit.prevent="asignar" class="space-y-5">
    <!-- Usuario -->
    <div>
      <label class="block mb-1 font-semibold text-gray-700">Usuario ID:</label>
      <input
        v-model="Usuario_ID"
        class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
        type="number"
        required
      />
    </div>

    <!-- Escuela -->
    <div class="relative">
      <label class="block mb-1 font-semibold text-gray-700">Buscar Institucion:</label>
      <input
        v-model="busquedaEscuela"
        @input="buscarEscuelas"
        class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
        type="text"
        autocomplete="off"
        placeholder="Escribí el nombre de la escuela"
      />
      <ul
        v-if="sugerencias.length"
        class="absolute z-10 bg-white border border-gray-300 rounded-md mt-1 w-full shadow-lg"
      >
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

    <!-- Rol -->
    <div>
      <label class="block mb-1 font-semibold text-gray-700">Rol:</label>
      <select
        v-model="Rol_ID"
        class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
        required
      >
        <option value="">Seleccione un rol</option>
        <option v-for="rol in roles" :key="rol.ID_Rol" :value="rol.ID_Rol">
          {{ rol.Nombre }}
        </option>
      </select>
    </div>

    <!-- Botón -->
    <div class="text-center">
      <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition duration-200"
      >
        Asignar
      </button>
    </div>
  </form>

  <!-- Asignaciones existentes -->
  <div class="mt-8">
    <h3 class="text-lg font-semibold text-gray-800 mb-2">Asignaciones existentes:</h3>
    <ul class="list-disc list-inside text-gray-700">
      <li
        v-for="asignacion in asignaciones"
        :key="asignacion.ID_UserRolEscuela"
      >
        {{ asignacion.usuario?.firstName }} {{ asignacion.usuario?.lastName }}
      </li>
    </ul>
  </div>
</div>

 

</template>

<script setup>
import { ref, onMounted, inject } from 'vue'
import axios from 'axios'
const Usuario_ID = ref('')
const Escuela_ID = ref('')
const busquedaEscuela = ref('')
const sugerencias = ref([])
const asignaciones = ref([])
const Rol_ID = ref('')
const roles = ref([])

const ejemplo = inject('userData')

const buscarEscuelas = async () => {
  if (busquedaEscuela.value.length < 2) {
    sugerencias.value = []
    return
  }

  try {
    const res = await axios.get(`${import.meta.env.VITE_API_URL}/api/instituciones/buscar?nombre=${busquedaEscuela.value}`)
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
    const res = await axios.get(`${import.meta.env.VITE_API_URL}/api/usuario-rol-escuela`)
    
    
    asignaciones.value = res.data
  } catch (error) {
    console.error('Error al cargar asignaciones', error)
  }
}
const cargarRoles = async () => {
  try {
    const res = await axios.get(`${import.meta.env.VITE_API_URL}/api/roles`)
    roles.value = res.data
  } catch (error) {
    console.error('Error al cargar roles', error)
  }
}
const asignar = async () => {
  try {
    await axios.post(`${import.meta.env.VITE_API_URL}/api/usuario-rol-escuela`, {
      Usuario_ID: parseInt(Usuario_ID.value),
      Escuela_ID: parseInt(Escuela_ID.value),
      Rol_ID: parseInt(Rol_ID.value)
    })

    Usuario_ID.value = ''
    Escuela_ID.value = ''
    Rol_ID.value = ''
    busquedaEscuela.value = ''
    await cargarAsignaciones()
  } catch (error) {
    console.error('Error al asignar usuario a escuela:', error)
    
  }
}

onMounted(() => {
  cargarAsignaciones()
   cargarRoles()
})
</script>
