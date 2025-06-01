<template>
  <section class="w-full bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">
            📅 Calendario
        </h2>

        <p class="text-center text-gray-600 mb-6">
            Visualizá tus clases, eventos y actividades programadas.
        </p>

        <div class="grid grid-cols-7 gap-2 text-center">
            <div
                v-for="(day, index) in ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']"
                :key="index"
                class="font-semibold text-gray-700"
            >
                {{ day }}
            </div>

            <div
                v-for="n in 30"
                :key="n"
                class="min-h-20 bg-blue-50 hover:bg-blue-100 transition rounded-lg p-2 text-sm text-gray-700"
            >
                {{ n }}
            </div>
        </div>
  </section>
</template>