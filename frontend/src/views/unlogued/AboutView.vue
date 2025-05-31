<script setup>
    import { ref, computed } from 'vue'

    const secciones = [
    {
        id: 'propuesta',
        titulo: 'Propuesta de Valor',
        texto: `El objetivo de AulaLink es modernizar la comunicación entre escuelas y familias con una solución integral que facilita el seguimiento académico y mejora la gestión educativa. 
    Ofrece una interfaz intuitiva, perfiles personalizados, mensajería directa, notificaciones automáticas y acceso al rendimiento desde cualquier dispositivo.`
    },
    {
        id: 'vision',
        titulo: 'Visión y Misión',
        texto: `AulaLink aspira a convertirse en un referente en soluciones digitales para el ámbito escolar, destacándose por su simplicidad, eficiencia y confiabilidad. 
    Su visión es transformar la comunicación educativa, brindando herramientas que acerquen a las instituciones y las familias, y permitan un seguimiento académico claro y accesible.`
    },
    {
        id: 'publico',
        titulo: 'Público Objetivo',
        texto: `El público objetivo de AulaLink son las instituciones educativas que buscan optimizar la comunicación con las familias, facilitando el envío de notificaciones sobre actividades escolares y generando reportes del rendimiento académico de los estudiantes.`
    },
    {
        id: 'descripcion',
        titulo: 'Descripción del Proyecto',
        texto: `AulaLink es una plataforma digital que creamos para transformar la comunicación entre las instituciones educativas y las familias.
    Está pensada para directivos, docentes, padres y alumnos, y busca ofrecer una experiencia simple, rápida y efectiva.
    Nuestra idea fue desarrollar una herramienta que no solo sirviera para enviar mensajes, sino que realmente permitiera estar conectados: desde notificaciones individuales y grupales, mensajería directa y grupal.
    Todo con una interfaz moderna, clara e intuitiva, que cualquiera pueda usar sin complicaciones.`
    },
    {
        id: 'funcionamiento',
        titulo: 'Funcionamiento y Características Claves',
        texto: `AulaLink está pensada para ser muy fácil de usar, tanto para los colegios como para las familias.
    Por un lado, los directivos y docentes pueden enviar mensajes a grupos de padres, a cursos específicos o incluso comunicarse con una familia en particular.
    Por otro lado, las familias pueden recibir toda esa información de forma clara y en tiempo real, sin depender de grupos de WhatsApp o cuadernos de comunicaciones.
    Además, desarrollamos un sistema de perfiles según el rol: directivo, docente, padre o alumno. Esto permite que cada usuario tenga acceso únicamente a la información que le corresponde, manteniendo la privacidad y la seguridad.
    Todo esto lo diseñamos con una interfaz moderna, intuitiva y adaptable a distintos dispositivos, para que cualquiera pueda usarla sin tener conocimientos técnicos.`
    }
    ]

    const seccionActiva = ref(secciones[0].id)

    const contenidoActual = computed(() =>
        secciones.find((s) => s.id === seccionActiva.value)
    )
</script>
<template>
    <section class="w-full max-w-[1300px] p-4 md:p-8 mx-auto flex flex-col justify-center">
        <h2 class="flex text-5xl text-gray-800 text-center font-bold mb-12 border-b-6 border-amber-400"> Sobre Nosotros </h2>
        <div class="p-6 flex flex-col md:flex-row rounded-2xl bg-blue-100 shadow-xl hover:shadow-2xl/30 duration-300">
            <aside class="w-full md:w-1/3 flex flex-col gap-4">
                <button
                    v-for="item in secciones"
                    :key="item.id"
                    @click="seccionActiva = item.id"
                    :class="[
                        'text-left px-4 py-2 rounded-lg font-semibold transition cursor-pointer',
                        seccionActiva === item.id
                            ? 'bg-blue-600 text-white'
                            : 'bg-white hover:bg-blue-100 text-gray-800 shadow'
                    ]"
                >
                    {{ item.titulo }}
                </button>
            </aside>
    
            <article class="relative w-full md:w-2/3 min-h-80 mt-6 md:mt-0 md:ml-8 bg-white shadow p-6 rounded-lg">
                <h2 class="text-2xl font-bold mb-4">{{ contenidoActual.titulo }}</h2>
                <p class="text-gray-700 whitespace-pre-line">
                    {{ contenidoActual.texto }}
                </p>
                <picture>
                    <img 
                        class="absolute top-2 right-2 w-16"
                        src="../../../public/img/logo/LogoSinTexto.png" 
                        alt=" Aula Link"
                        title="Aula Link"
                    >
                </picture>
            </article>
        </div>
    </section>
</template>

