<script setup>
import { defineEmits, defineProps } from 'vue';

const props = defineProps({
  show: Boolean,
  title: { type: String },
  message: { type: String},
});

const emit = defineEmits(['close']);
</script>

<template>
  <transition name="fade">
    <div
      v-if="show"
      class="fixed inset-0 flex items-center justify-center bg-gray-800/70 z-50"
    >
      <div
        class="bg-blue-100 max-w-sm w-full p-6 rounded-xl shadow-xl text-center relative animate-fade-in-up border border-blue-200"
      >
        <button
          @click="emit('close')"
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

        <h2 class="text-lg font-bold text-gray-800 mb-1">{{ title }}</h2>
        <p class="text-gray-700 text-sm">{{ message }}</p>

        <button
          @click="emit('close')"
          class="mt-5 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition"
        >
          Cerrar
        </button>
      </div>
    </div>
  </transition>
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
