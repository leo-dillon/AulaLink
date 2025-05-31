<script setup>
import { ref } from 'vue'
import { validatePagoForm } from '@/utils/validationForms/validationPaymentsForm'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  metodo_pago: '',
  cbu: '',
  titular: '',
  numero_tarjeta: '',
  dni: '',
  vencimiento: '',
  monto: '',
  usuario_id: 1 // <-- lo podés cambiar si lo obtenés del usuario logueado
})

const errors = ref({})

const handleSubmit = async () => {
  errors.value = validatePagoForm(form.value)

  if (Object.values(errors.value).some(e => e)) return

  try {
    const response = await fetch('http://localhost:8000/api/pago', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(form.value)
    })

    if (!response.ok) throw new Error('Error al registrar el pago')

    const data = await response.json()
    console.log('Pago creado:', data)

    router.push('/crear_escuela') // redireccionar a creación de escuela
  } catch (error) {
    console.error(error)
  }
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
      <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-blue-800">Registro de Pago</h2>
      </div>

      <form @submit.prevent="handleSubmit">
        <!-- Método de pago -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Método de Pago</label>
          <select v-model="form.metodo_pago" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option disabled value="">Seleccione...</option>
            <option>Transferencia</option>
            <option>Tarjeta</option>
          </select>
        </div>

        <!-- Transferencia -->
        <div v-if="form.metodo_pago === 'Transferencia'" class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">CBU</label>
          <input v-model="form.cbu" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p class="text-red-500 text-sm mt-1">{{ errors.cbu }}</p>
        </div>

        <!-- Tarjeta -->
        <div v-if="form.metodo_pago === 'Tarjeta'">
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Titular</label>
            <input v-model="form.titular" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p class="text-red-500 text-sm mt-1">{{ errors.titular }}</p>
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Número de tarjeta</label>
            <input v-model="form.numero_tarjeta" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p class="text-red-500 text-sm mt-1">{{ errors.numero_tarjeta }}</p>
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
            <input v-model="form.dni" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p class="text-red-500 text-sm mt-1">{{ errors.dni }}</p>
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Vencimiento</label>
            <input type="month" v-model="form.vencimiento" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p class="text-red-500 text-sm mt-1">{{ errors.vencimiento }}</p>
          </div>
        </div>

        <!-- Monto -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Monto</label>
          <input type="number" v-model="form.monto" min="0" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <p class="text-red-500 text-sm mt-1">{{ errors.monto }}</p>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
          Pagar
        </button>
      </form>
    </div>
  </div>
</template>



