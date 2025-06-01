<script setup>
import { ref } from 'vue'

const form = ref({
  nombre: '',
  email: '',
  mensaje: ''
})

function enviarFormulario() {
  alert(`Gracias por tu mensaje, ${form.value.nombre}!`)
  // Aquí podrías enviar los datos al backend
  form.value = { nombre: '', email: '', mensaje: '' }
}
</script>

<template>
  <section class="mt-24 px-4">
    <div class="max-w-3xl mx-auto bg-blue-100 p-8 rounded-xl shadow-lg">
      <h1 class="text-3xl lg:text-4xl font-bold text-blue-800 text-center mb-8">
        Contactanos
      </h1>

      <form @submit.prevent="enviarFormulario" class="space-y-6">
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
          <input
            v-model="form.nombre"
            type="text"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white"
            required
          />
        </div>

        <div>
          <label class="block text-gray-700 font-semibold mb-1">Correo electrónico</label>
          <input
            v-model="form.email"
            type="email"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white"
            required
          />
        </div>

        <div>
          <label class="block text-gray-700 font-semibold mb-1">Mensaje</label>
          <textarea
            v-model="form.mensaje"
            rows="5"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white resize-none"
            required
          ></textarea>
        </div>

        <button
          type="submit"
          class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition"
        >
          Enviar mensaje
        </button>
      </form>
    </div>
  </section>
</template>

