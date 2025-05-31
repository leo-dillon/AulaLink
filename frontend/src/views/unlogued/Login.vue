<script setup>
    import { ref } from 'vue'
    import axios from 'axios'

    const data = ref({
        email: '',
        password: ''
    })
    const errorMessage = ref('')

    const handleLogin = async () => {
        try {
            const response = await axios.post('http://localhost:8000/api/user/login', data.value)
            // Guardando JWT
            localStorage.setItem('dataUser', JSON.stringify(response.data.datosUser))
            response.data.datosUser
            errorMessage.value = ''
            location.href = '/user'

        } catch (error) {
            console.log(error)
            errorMessage.value = 'Correo o contraseña incorrectos.'
        }
    }
</script>

<template>
    <div class="py-12 flex items-center justify-center bg-gray-100">
        <div class="bg-blue-100 shadow-xl/50 rounded-xl w-full max-w-md p-8">
            <img src="/img/logo/logoAulaLink2.png" alt="Logo AulaLink" class=" mx-auto"> 
            <h2 class="text-4xl font-semibold text-center mb-6 text-gray-800">Iniciar sesión</h2>
            <form @submit.prevent="handleLogin" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input
                        type="email"
                        id="email"
                        v-model="data.email"
                        placeholder="escribeTuEmail@gmail.com"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input
                        type="password"
                        id="password"
                        v-model="data.password"
                        placeholder="contraseña "
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    />
                </div>
                
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 cursor-pointer"
                    >
                    Iniciar sesión
                </button>
                <p v-if="errorMessage" class="text-red-600 text-sm mt-2 text-center">{{ errorMessage }}</p>
            </form>
            <div class="my-4 flex justify-between items-center">
                <RouterLink to="/registrarse" class=""> ¿ No tienes cuenta ? </RouterLink>
                <RouterLink to="/registrarse" class=""> ¿ olvidaste tu contraseña ? </RouterLink>
            </div>
        </div>
    </div>
</template>