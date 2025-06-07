<script setup>
import axios from "axios";
import { ref } from "vue";
import SuccessModal from '@/components/ui/SuccessModal.vue';

const message = ref({
  messaje: "",
  nombre: "",
  email: "",
});
const loading = ref(false);
const showSuccessModal = ref(false);

const sendMessage = async () => {
  try {
    loading.value = true;
    const res = await axios.post(
      "https://formsubmit.co/ajax/jeannotegui@gmail.com",
      message.value,
      {
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
      }
    );

    if (res.data.success === "true") {
      showSuccessModal.value = true;
    } else {
      alert("Ocurrió un error");
    }
  } catch (error) {
    console.log(error);
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <section class="max-w-xl mx-auto mt-16 p-6 bg-blue-100 shadow-xl/50 rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Contacto</h2>
    <p class="text-gray-600 mb-6">Completá el formulario y nos pondremos en contacto con vos.</p>

    <form @submit.prevent="sendMessage" class="space-y-4">
      <!-- Nombre -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Nombre</label>
        <input
          type="text"
          v-model="message.nombre"
          required
          class="bg-white w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Leonardo Dillon"
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
          placeholder="ejemplo@gmail.com"
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
          placeholder="Envianos tus consultas aquí !!!"
        ></textarea>
      </div>

      <!-- Botón -->
      <button
        type="submit"
        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition cursor-pointer"
      >
        <p v-if="loading">Enviando ...</p>
        <p v-else>Enviar mensaje</p>
      </button>
    </form>
    
    <SuccessModal
  :show="showSuccessModal"
  title="¡Mensaje enviado!"
  message="Aulalink se comunicará con vos a la brevedad."
  @close="showSuccessModal = false"
/>
  </section>
</template>
