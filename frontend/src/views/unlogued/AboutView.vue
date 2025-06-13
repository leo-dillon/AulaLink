<script setup>

const secciones = [
  {
    id: 'propuesta',
    titulo: 'Propuesta de Valor',
    texto: `El objetivo de AulaLink es modernizar la comunicación entre escuelas y familias con una solución integral que facilita el seguimiento académico y mejora la gestión educativa. Ofrece una interfaz intuitiva, perfiles personalizados, mensajería directa, notificaciones automáticas y acceso al rendimiento desde cualquier dispositivo.`,
    img: '/img/landing/propuesta-de-valor.jpg'
  },
  {
    id: 'vision',
    titulo: 'Visión y Misión',
    texto: `AulaLink aspira a convertirse en un referente en soluciones digitales para el ámbito escolar, destacándose por su simplicidad, eficiencia y confiabilidad. Su visión es transformar la comunicación educativa, brindando herramientas que acerquen a las instituciones y las familias.`,
    img: '/img/landing/vision-mision.jpg'
  },
  {
    id: 'publico',
    titulo: 'Público Objetivo',
    texto: `El público objetivo de AulaLink son las instituciones educativas que buscan optimizar la comunicación con las familias, facilitando el envío de notificaciones sobre actividades escolares y generando reportes del rendimiento académico de los estudiantes.`,
    img: '/img/landing/publico-objetivo.jpg'
  },
  {
    id: 'descripcion',
    titulo: 'Descripción del Proyecto',
    texto: `AulaLink es una plataforma digital pensada para directivos, docentes, padres y alumnos. Su objetivo es ofrecer una experiencia simple y efectiva de comunicación escolar. Desde mensajes individuales y grupales hasta notificaciones automáticas y reportes académicos, todo se gestiona desde una interfaz moderna y accesible.`,
    img: '/img/landing/descripcion.jpg'
  },
  {
    id: 'funcionamiento',
    titulo: 'Funcionamiento y Características Claves',
    texto: `AulaLink está diseñada para ser intuitiva. Los directivos y docentes pueden comunicarse por cursos o individualmente, mientras que las familias reciben toda la información en tiempo real. La plataforma organiza todo según el rol del usuario para mayor privacidad y seguridad.`,
    img: '/img/landing/funcionamiento.jpg'
  }
]
</script>

<template>
  <section class="w-full max-w-6xl mx-auto p-6 space-y-24">
    <div class="text-center">
      <h2 class="text-5xl font-extrabold text-gray-800 mb-4">Conocé AulaLink</h2>
      <p class="text-gray-600 text-lg">Una solución completa para la gestión educativa moderna</p>
    </div>

    <div
      v-for="seccion in secciones"
      :key="seccion.id"
      class="flex flex-col-reverse md:flex-row items-center gap-10 md:gap-20"
    >
      <div class="w-full md:w-1/2">
        <h3 class="text-3xl font-bold text-blue-800 mb-4">{{ seccion.titulo }}</h3>
        <p class="text-gray-700 whitespace-pre-line text-lg leading-relaxed">{{ seccion.texto }}</p>
      </div>
      <div class="w-full md:w-1/2">
        <img
          :src="seccion.img"
          :alt="seccion.titulo"
          class="w-full max-w-md h-64 object-cover mx-auto rounded-xl shadow-md"
        />
      </div>
    </div>
  </section>
</template>
