<script setup>
    import { inject} from 'vue';
    import { RouterLink } from 'vue-router';
    const userData = inject('userData')
    const userName = 1;
</script>


<template>
    <div class="flex flex-col gap-6 p-6">
        <!-- Sección Bienvenida -->
        <section class="bg-cyan-100 p-6 rounded-2xl shadow-md">
            <h2 class="text-2xl font-bold text-cyan-800">¡Bienvenido, {{ nombreUsuario }}!</h2>
            <p class="mt-2 text-cyan-700">Esperamos que tengas una excelente experiencia.</p>
        </section>

        <!-- Sección Calendario -->
        <section class="bg-orange-100 p-6 rounded-2xl shadow-md">
            <h3 class="text-xl font-semibold text-orange-800">Calendario</h3>
            <p class="mt-2 text-orange-700">Consultá tus eventos, fechas de exámenes o actividades.</p>
            <RouterLink to="/user/calendario" class="inline-block mt-3 text-orange-900 underline hover:text-orange-700">
                Ir al calendario
            </RouterLink>
        </section>

        <!-- Sección Escuelas -->
        <section class="bg-green-100 p-6 rounded-2xl shadow-md">
            <h3 class="text-xl font-semibold text-green-800">Escuelas</h3>
            <p class="mt-2 text-green-700">Revisá las instituciones y materias asociadas.</p>
            <RouterLink to="/user/escuela" class="inline-block mt-3 text-green-900 underline hover:text-green-700">
                Ver escuelas
            </RouterLink>
        </section>
    </div>
</template>