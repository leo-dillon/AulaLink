<script setup>
    import axios from 'axios';
import { ref } from 'vue';

    const message = ref({
        messaje:    '',
        nombre:     '',
        email:      '',
    })

    const sendMessage = async ( ) => {
        try {

            const asd = await axios.post('https://formsubmit.co/ajax/jeannotegui@gmail.com', message.value, {
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json   "
                }
            })
            console.log(asd);
            
        } catch (error) {
            console.log(error)
        }
    }
</script>

<template>
    <section class="max-w-xl mx-auto mt-16 p-6 bg-blue-100  shadow-xl/50 rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Contacto</h2>
        <p class="text-gray-600 mb-6">Completá el formulario y nos pondremos en contacto con vos.</p>

        <form
            @submit.prevent="sendMessage"
            class="space-y-4"
        >
        <!-- Nombre -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input
                type="text"
                v-model="message.nombre"
                required
                class="bg-white w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input
                type="email"
                v-model="message.email"
                required
                class="bg-white w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <!-- Mensaje -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Mensaje</label>
            <textarea
                rows="4"
                v-model="message.messaje"
                required
                class="bg-white w-full max-h-50 mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
        </div>

        <!-- Botón -->
        <button
            type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition cursor-pointer"
        >
            Enviar mensaje
        </button>
        </form>
    </section>
</template>
