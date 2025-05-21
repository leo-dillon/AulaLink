
<script setup>
import axios from 'axios'
import { validateRegisterForm } from '@/utils/validationForms/validationRegisterForm'
import { ref } from 'vue'

// const form = ref({
//   firstName: '',
//   lastName: '',
//   gender: '',
//   birthdate: '',
//   dni: '',
//   email: '',
//   address: '',
//   phone: '',
//   password: '',
//   asset: true,
//   photo: null,
// })

//                ----------------------------  TEST -------------------------
const form = ref({
  firstName: 'test',
  lastName: 'Test_1',
  gender: 'Masculino',
  birthdate: '1930-01-01',
  dni: '10000000',
  email: 'test_1@gmail.com',
  address: 'Una dirección valida de Test_1',
  phone: '2324000000',
  password: 'test_1',
  asset: true,
  photo: null,
})

let errorMessage = ref('')
let validateError = ref({})

const handleRegister = async () => {
  try {
    const validateResult = validateRegisterForm(form.value)
    validateError.value = validateResult  

    if(!(Object.keys(validateError.value).length === 0)){
    }else{
      const response = await axios.post('http://localhost:8000/api/user/create', form.value)
    }
    // Aquí podés usar axios para enviar los datos al backend
  } catch (error) {
    errorMessage.value = 'Error al registrar el usuario.'
    if(error.response?.data.errors.dni[0])     validateError.value.dni = 'El DNI ya esta registrado.'
    if(error.response?.data.errors.email[0])   validateError.value.email = 'El email ya esta registrado.'
  }
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-md rounded-xl w-full max-w-2xl p-8">
      <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Registro de Usuario</h2>
      <form @submit.prevent="handleRegister" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
          <input v-model="form.firstName" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
          <small v-if="validateError.firstName" class="text-red-500">
            {{ (validateError.firstName) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
          <input v-model="form.lastName" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.lastName" class="text-red-500">
            {{ (validateError.lastName) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Género</label>
          <select v-model="form.gender" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="" disabled>Seleccionar</option>
            <option>Masculino</option>
            <option>Femenino</option>
            <option>Otro</option>
          </select>
          <small v-if="validateError.gender" class="text-red-500">
            {{ (validateError.gender) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
          <input v-model="form.birthdate" type="date" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.birthdate" class="text-red-500">
            {{ (validateError.birthdate) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
          <input v-model="form.dni" type="number" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.dni" class="text-red-500">
            {{ (validateError.dni) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
          <input v-model="form.email" type="email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.email" class="text-red-500">
            {{ (validateError.email) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
          <input v-model="form.address" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.address" class="text-red-500">
            {{ (validateError.address) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
          <input v-model="form.phone" type="tel" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.phone" class="text-red-500">
            {{ (validateError.phone) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
          <input v-model="form.password" type="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <small v-if="validateError.password" class="text-red-500">
            {{ (validateError.password) }}
          </small>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Foto (URL o base64)</label>
          <input v-model="form.photo" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="col-span-full">
          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
          >
            Registrarse
          </button>
          <p v-if="errorMessage" class="text-red-600 text-sm mt-2 text-center">{{ errorMessage }}</p>
        </div>
      </form>
    </div>
  </div>
</template>