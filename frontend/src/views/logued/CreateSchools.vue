<script setup>
import {reactive,ref} from 'vue';
import axios from 'axios'
import { validateInstitutionForm } from '@/utils/validationForms/validationSchoolsForm '
                                         

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
      Usuario_ADM:"1",
    })

    const errorMessage = ref('')
    let validateError = ref({})
    const handleSubmit = async () =>{
  try {
   
    const validateResult = validateInstitutionForm(Shool)
    validateError.value = validateResult  
   
    // ⚠️ Si hay errores, detenemos la ejecución
    if (Object.keys(validateResult).length > 0) {
      return
    }
    // Envía POST a Laravel 
await axios.post(`${import.meta.env.VITE_API_URL}/api/CreateInstituciones`, Shool)
  
    alert('Institución creada con éxito')
    // limpiar formulario
     Object.keys(Shool).forEach(key => Shool[key] = '')
  } catch (error) {
    errorMessage.value = 'Error al registrar el usuario.'
    console.error(error)
  }
}
</script>

<template>
        

 <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-2xl shadow-lg">
            <h2 class="text-center text-3xl font-bold text-gray-900">Crea tu cuenta</h2>

            <form @submit.prevent="handleSubmit" class="space-y-6" action="" method="POST" enctype="multipart/form-data">
                

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
 <!-- Nombre -->
 <div>
    <label for="Nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
    <input v-model="Shool.Nombre" type="text" id="Nombre" name="Nombre" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"  />
     <small v-if="validateError.Nombre" class="text-red-500">
            {{ (validateError.Nombre) }}
          </small>
  </div>

  <!-- CUE -->
  <div>
    <label for="CUE" class="block text-sm font-medium text-gray-700">CUE</label>
    <input v-model="Shool.CUE" type="text" id="CUE" name="CUE" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
  <small v-if="validateError.CUE" class="text-red-500">
            {{ (validateError.CUE) }}
          </small>
  </div>

  <!-- Dirección -->
  <div>
    <label for="Direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
    <input v-model="Shool.Direccion" type="text" id="Direccion" name="Direccion" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
     <small v-if="validateError.Direccion" class="text-red-500">
            {{ (validateError.Direccion) }}
          </small>
  </div>

  <!-- Localidad -->
  <div>
    <label for="Localidad" class="block text-sm font-medium text-gray-700">Localidad</label>
    <input v-model="Shool.Localidad" type="text" id="Localidad" name="Localidad" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
  <small v-if="validateError.Localidad" class="text-red-500">
            {{ (validateError.Localidad) }}
          </small>
  </div>

  <!-- Provincia -->
  <div>
    <label for="Provincia" class="block text-sm font-medium text-gray-700">Provincia</label>
    <input v-model="Shool.Provincia" type="text" id="Provincia" name="Provincia" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
  <small v-if="validateError.Provincia" class="text-red-500">
            {{ (validateError.Provincia) }}
          </small>
  </div>

  <!-- Teléfonos -->
  <div>
    <label for="Telefonos" class="block text-sm font-medium text-gray-700">Teléfonos</label>
    <input v-model="Shool.Telefonos" type="tel" id="Telefonos" name="Telefonos" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
  <small v-if="validateError.Telefonos" class="text-red-500">
            {{ (validateError.Telefonos) }}
          </small>
  </div>

  <!-- Emails -->
  <div>
    <label for="Emails" class="block text-sm font-medium text-gray-700">Emails</label>
    <input v-model="Shool.Emails" type="email" id="Emails" name="Emails" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
  <small v-if="validateError.Emails" class="text-red-500">
            {{ (validateError.Emails) }}
          </small>
  </div>

  

  <!-- Nivel -->
  <div>
  <label for="Nivel" class="block text-sm font-medium text-gray-700">Nivel Educativo</label>
  <select v-model="Shool.Nivel" id="Nivel" name="Nivel" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    <option value="Inicial">Inicial</option>
    <option value="Primario" >Primario</option>
    <option value="Secundario">Secundario</option>
    <option value="Terciario">Terciario</option>
  </select>
   <small v-if="validateError.Nivel" class="text-red-500">
            {{ (validateError.Nivel) }}
          </small>
</div>

  <!-- Tipo -->
  <div>
    <label for="Tipo" class="block text-sm font-medium text-gray-700">Tipo de gestion</label>
    <select v-model="Shool.Tipo" id="Tipo" name="Tipo" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      <option value="Privado">Privado</option>
      <option value="Publico" >Publico</option>
      <option value="subvencionada">Subvencionada</option>
    </select>
     <small v-if="validateError.Tipo" class="text-red-500">
            {{ (validateError.Tipo) }}
          </small>
  </div>

  <!-- Usuario_ADM -->
  <!-- <div>
    <label for="Usuario_ADM" class="block text-sm font-medium text-gray-700">Usuario ADM</label>
    <input  type="text" id="Usuario_ADM" name="Usuario_ADM" value="" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
  </div> -->
                    

                    </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                        Crear Institucion
                    </button>
                </div>
            </form>
        </div>
    </div>

</template>

<style>
</style>