<script setup>
    import axios from 'axios';
        import { inject, onMounted, ref } from 'vue';
    import { RouterLink } from 'vue-router';
    
    const userData = inject('userData')
    let form = ref({
        firstName: '',
        lastName: '',
        gender: '',
        birthdate: '',
        dni: '',
        address: '',
        phone: '',
        photo: null,
    })

    onMounted( async () => {
        try{
            const res = await axios.get(`${import.meta.env.VITE_API_URL}/api/user/${userData.id}`)
            form.value = res.data
            console.log(form.value)
        }catch(error){
            console.log(error)
        }
    })
</script>


<template>
    <div class="w-full flex flex-col gap-16 px-6 py-12">
        <!-- Sección Bienvenida -->
        <section class="w-full">
            <h2 class="mb-4 text-4xl font-bold text-gray-800 text-center">¡Bienvenido, {{ userData.firstName }}!</h2>
            <p class="block w-full mt-2 text-lg text-gray-600 text-center">Mirá, Administra y Edita tus datos desde este sitio.</p>
        </section>

        <!-- Sección Calendario -->
        <section class="bg-blue-100 p-6 rounded-2xl shadow-lg hover:shadow-xl/30 transition">
            <h3 class="text-2xl font-semibold text-gray-800">Tu Calendario de está semana</h3>
            <p class="mt-2 text-gray-700">Consultá tus eventos, fechas de exámenes o actividades.</p>
            <div class="relative py-8 my-4 flex gap-4">
                <p class="absolute top-0 left-0">Calendario de la semana.</p>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">1</div>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">2</div>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">3</div>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">4</div>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">5</div>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">6</div>
                <div class="flex-1 p-4 rounded-2xl border border-blue-800 bg-amber-50">7</div>
            </div>
            <RouterLink to="/user/calendario" class="inline-block mt-3 text-gray-900 underline hover:text-gray-700" title="Ver Calendario completo">
                Ver calendario completo
            </RouterLink>
        </section>

        <!-- Sección Escuelas -->
        <section class="bg-blue-100 p-6 rounded-2xl shadow-lg hover:shadow-xl/30 transition">
            <h3 class="text-xl font-semibold text-gray-800">Escuelas</h3>
            <p class="mt-2 text-gray-700">Revisá las instituciones y materias asociadas.</p>
            <RouterLink to="/user/escuela" class="inline-block mt-3 text-gray-900 underline hover:text-gray-700">
                Ver escuelas
            </RouterLink>
        </section>
        
    </div>
</template>