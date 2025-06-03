<script setup>
import axios from "axios";
import { ref } from "vue";

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
        <p v-if="loading">Enviando ...</p>
        <p v-else>Enviar mensaje</p>
      </button>
    </form>
    <!-- Modal de confirmación visual -->
    <transition name="fade">
      <div
        v-if="showSuccessModal"
        class="fixed inset-0 flex items-center justify-center bg-gray-800/70 z-50"
      >
        <div
          class="bg-blue-100 max-w-sm w-full p-6 rounded-xl shadow-xl text-center relative animate-fade-in-up border border-blue-200"
        >
          <button
            @click="showSuccessModal = false"
            class="absolute top-3 right-4 text-gray-600 hover:text-gray-800 text-2xl"
          >
            &times;
          </button>

          <svg
            class="w-14 h-14 text-green-500 mx-auto mb-3"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            viewBox="0 0 24 24"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>

          <h2 class="text-lg font-bold text-gray-800 mb-1">¡Mensaje enviado!</h2>
          <p class="text-gray-700 text-sm">Aulalink se comunicará con vos a la brevedad.</p>

          <button
            @click="showSuccessModal = false"
            class="mt-5 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition"
          >
            Cerrar
          </button>
        </div>
      </div>
    </transition>
  </section>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
@keyframes fade-in-up {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 0.4s ease-out;
}
</style>
