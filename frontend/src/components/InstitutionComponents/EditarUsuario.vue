<script setup>
  import axios from 'axios';
  import { inject, onMounted, reactive, ref } from 'vue';
  import { validationEditUser } from '@/utils/validationForms/validationEditUser.js'

  const userData = inject('userData')
  let form = reactive({
    firstName: '',
    lastName: '',
    gender: '',
    birthdate: '',
    dni: '',
    address: '',
    phone: '',
    photo: null,
  })
  let errorMessage = ref('')
  let validateError = ref({})
  

  const handleEdit = async () => {
    try {
      const validarData = validationEditUser(form)
      validateError.value = validarData
      if((Object.keys(validateError.value).length === 0)){
        console.log(`${import.meta.env.VITE_API_URL}/api/user/edit/${userData.id}`, form)
        const response = await axios.post(`${import.meta.env.VITE_API_URL}/api/user/edit/${userData.id}`, form)
        console.log(response)
        if(response.status == 200){
          // location.reload()
        }
      }
    } catch (error) {
      console.log('EditarUsuario', error)
    }
  }

  onMounted( async () => {
    try{
      const res = await axios.get(`${import.meta.env.VITE_API_URL}/api/user/${userData.id}`)
      Object.assign(form, res.data)
      console.log(res.data)
    }catch(error){
      console.log(error)
    }
  })

</script>
  <template>
  <div class="w-full flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-md rounded-xl w-full max-w-2xl p-8">
      <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Editar datos usuario</h2>
      <form @submit.prevent="handleEdit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
          <label class="block text-sm font-medium text-gray-700 mb-1">Foto (URL o base64)</label>
          <input v-model="form.photo" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="col-span-full">
          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
          >
            Enviar
          </button>
          <p v-if="errorMessage" class="text-red-600 text-sm mt-2 text-center">{{ errorMessage }}</p>
        </div>
      </form>
    </div>
  </div>
</template>