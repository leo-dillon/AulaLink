
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
  firstName: 'Leo',
  lastName: 'Dillon',
  gender: 'Masculino',
  birthdate: '1999-03-16',
  dni: '41781369',
  email: 'leo@gmail.com',
  address: 'Una dirección valida',
  phone: '2324697491',
  password: 'leo123',
  asset: true,
  photo: null,
})

const errorMessage = ref('')
let validateError = ref({})

const handleRegister = async () => {
  try {
    const validateResult = validateRegisterForm(form.value)
    validateError.value = validateResult  

    console.log(form.value)

    if(!(Object.keys(validateError).length === 0)){
      console.log('El objeto esta lleno')
    }else{
      console.log('El objeto esta vacio')
    }
    // Aquí podés usar axios para enviar los datos al backend
    // const response = await axios.post('http://localhost:8000/api/user/create', form.value)
    // console.log(response)
  } catch (error) {
    errorMessage.value = 'Error al registrar el usuario.'
    console.log(error)
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