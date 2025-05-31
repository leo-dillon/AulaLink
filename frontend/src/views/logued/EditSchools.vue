<script setup>
import {reactive, onMounted, ref} from 'vue';
import axios from 'axios'
import { useRoute } from 'vue-router'
import { validateInstitutionForm } from '@/utils/validationForms/validationSchoolsForm '

const route = useRoute();
const id = route.params.id; // El ID viene desde la URL
//const id = 1; // ⬆⬆El ID viene desde la URL

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
    const errorMessage = ref('')
    let validateError = ref({})
// Obtener datos al cargar
onMounted(async () => {
  try {
    const res = await axios.get(`${import.meta.env.VITE_API_URL}/api/Editar/Institucion/${id}`);
    Object.assign(Shool, res.data);
  } catch (error) {
    console.error("Error al cargar institución", error);
  }
});

//Actualizar institución
const handleSubmit = async () => {
  try {
    const validateResult = validateInstitutionForm(Shool)
    validateError.value = validateResult  
   
    // ⚠️ Si hay errores, detenemos la ejecución
    if (Object.keys(validateResult).length > 0) {
      return
    }
    const res = await axios.put(`http://127.0.0.1:8000/api/Editar/Institucion/${id}`, Shool);
    alert('Institución actualizada con éxito');
  } catch (error) {
    alert('Error al actualizar institución');
    console.error(error);
  }
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-2xl shadow-lg">
      <h2 class="text-center text-3xl font-bold text-gray-900">Editar Institución</h2>

      <div class="space-y-4">
        <div>
          <label class="block text-gray-700 font-semibold">Nombre</label>
          <input v-model="Shool.Nombre" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.Nombre" class="text-red-500">
            {{ (validateError.Nombre) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">CUE</label>
          <input v-model="Shool.CUE" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.CUE" class="text-red-500">
            {{ (validateError.CUE) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Dirección</label>
          <input v-model="Shool.Direccion" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.Direccion" class="text-red-500">
            {{ (validateError.Direccion) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Localidad</label>
          <input v-model="Shool.Localidad" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.Localidad" class="text-red-500">
            {{ (validateError.Localidad) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Provincia</label>
          <input v-model="Shool.Provincia" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.Provincia" class="text-red-500">
            {{ (validateError.Provincia) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Teléfonos</label>
          <input v-model="Shool.Telefonos" type="tel" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.Telefonos" class="text-red-500">
            {{ (validateError.Telefonos) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Emails</label>
          <input v-model="Shool.Emails" type="email" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
          <small v-if="validateError.Emails" class="text-red-500">
            {{ (validateError.Emails) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Nivel</label>
          <select v-model="Shool.Nivel" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            <option value="">Selecciona</option>
            <option value="Inicial">Inicial</option>
            <option value="Primario">Primario</option>
            <option value="Secundario">Secundario</option>
            <option value="Terciario">Terciario</option>
          </select>
          <small v-if="validateError.Nivel" class="text-red-500">
            {{ (validateError.Nivel) }}
          </small>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold">Tipo</label>
          <select v-model="Shool.Tipo" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            <option value="">Selecciona</option>
            <option value="Privado">Privado</option>
            <option value="Publico">Público</option>
            <option value="subvencionada">Subvencionada</option>
          </select>
          <small v-if="validateError.Tipo" class="text-red-500">
            {{ (validateError.Tipo) }}
          </small>
        </div>

        <div class="pt-4">
          <button @click="handleSubmit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Guardar cambios
          </button>
        </div>
      </div>
    </div>
  </div>
</template>


<style>
</style>