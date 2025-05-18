
<script setup>
    import { ref } from 'vue'

    const email = ref('')
    const password = ref('')
    const errorMessage = ref('')

    const handleLogin = async () => {
    try {
        // Acá iría tu lógica de login, por ejemplo con axios
        console.log('Login con:', email.value, password.value)
        // Resetear error si todo sale bien
        errorMessage.value = ''
    } catch (error) {
        errorMessage.value = 'Correo o contraseña incorrectos.'
    }
    }
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-md rounded-xl w-full max-w-md p-8">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Iniciar sesión</h2>
            
            <form @submit.prevent="handleLogin" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <input
                        type="email"
                        id="email"
                        v-model="email"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input
                        type="password"
                        id="password"
                        v-model="password"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
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