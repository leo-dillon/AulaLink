<script setup>
    import axios from 'axios'
    import { validateRegisterForm } from '@/utils/validationForms/validationRegisterForm'
    import { ref } from 'vue'

    const form = ref({
        firstName: '',
        lastName: '',
        gender: '',
        birthdate: '',
        dni: '',
        email: '',
        address: '',
        phone: '',
        password: '',
        asset: true,
        photo: null,
    })

    //                ----------------------------  TEST -------------------------
    // const form = ref({
    //   firstName: 'test_2',
    //   lastName: 'Test_2',
    //   gender: 'Masculino',
    //   birthdate: '1930-01-01',
    //   dni: '10000001',
    //   email: 'test_2@gmail.com',
    //   address: 'Una dirección valida de Test_1',
    //   phone: '2324000000',
    //   password: 'test_2',
    //   asset: true,
    //   photo: null,
    // })

    let errorMessage = ref('')
    let validateError = ref({})

    const handleRegister = async () => {
        try {
            const validateResult = validateRegisterForm(form.value)
            validateError.value = validateResult  
            if((Object.keys(validateError.value).length === 0)){
                const response = await axios.post(`${import.meta.env.VITE_API_URL}/api/user/create`, form.value)
                if(response.status == 200){
                location.href = "/"
                }
            }
        } catch (error) {
            errorMessage.value = 'Error al registrar el usuario.'
            if(error.response?.data.errors.dni[0])     validateError.value.dni = 'El DNI ya esta registrado.'
            if(error.response?.data.errors.email[0])   validateError.value.email = 'El email ya esta registrado.'
        }
    }
</script>

<template>
    <div class="pb-4 flex items-center justify-center bg-gray-100">
        <div class="bg-blue-100 shadow-xl/50 rounded-xl w-full max-w-2xl p-8">
            <img src="/img/logo/logoAulaLink2.png" alt="Logo AulaLink" class=" mx-auto"> 

            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Registro de Usuario</h2>
            <form @submit.prevent="handleRegister" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class=" block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input 
                        v-model="form.firstName" 
                        type="text" 
                        required 
                        class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nombre"
                    />
                    <small v-if="validateError.firstName" class="text-red-500">
                        {{ (validateError.firstName) }}
                    </small>
                </div>
                <div>
                    <label class=" block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input 
                        v-model="form.lastName" 
                        type="text" 
                        required 
                        class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Apellido"
                    />
                    <small v-if="validateError.lastName" class="text-red-500">
                        {{ (validateError.lastName) }}
                    </small>
                </div>
                <div>
                    <label class=" block text-sm font-medium text-gray-700 mb-1">Género</label>
                    <select v-model="form.gender" required class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                    <input 
                        v-model="form.birthdate" 
                        type="date" 
                        required 
                        class="bg-white 
                        w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    />
                    <small v-if="validateError.birthdate" class="text-red-500">
                        {{ (validateError.birthdate) }}
                    </small>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
                    <input
                        v-model="form.dni"
                        type="number"
                        required
                        class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="12345678"
                    />
                    <small v-if="validateError.dni" class="text-red-500">
                        {{ (validateError.dni) }}
                    </small>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input 
                        v-model="form.email" 
                        type="email" 
                        required 
                        class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="ejemplo@gmail.com"
                    />
                    <small v-if="validateError.email" class="text-red-500">
                        {{ (validateError.email) }}
                    </small>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input 
                        v-model="form.address" 
                        type="text" 
                        required 
                        class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Avenida Pueyrredon 751, CABA, AR"
                    />
                    <small v-if="validateError.address" class="text-red-500">
                        {{ (validateError.address) }}
                    </small>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input 
                        v-model="form.phone" 
                        type="tel" 
                        required 
                        class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="1234567890"
                    />
                    <small v-if="validateError.phone" class="text-red-500">
                        {{ (validateError.phone) }}
                    </small>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <input v-model="form.password" type="password" required class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <small v-if="validateError.password" class="text-red-500">
                        {{ (validateError.password) }}
                    </small>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto (URL o base64)</label>
                    <input v-model="form.photo" type="text" class="bg-white w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="col-span-full">
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 cursor-pointer"
                    >
                        Registrarse
                    </button>
                    <p v-if="errorMessage" class="text-red-600 text-sm mt-2 text-center">{{ errorMessage }}</p>
                </div>
            </form>
        </div>
    </div>
</template>