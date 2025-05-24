<template>
  <div v-if="camposFormulario.length" class="mt-8">
  <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">
    Datos requeridos para el rol: <strong>{{ nombreRol }}</strong>
  </h3>

   <form
    @submit.prevent="guardarDatosRol"
    class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-md space-y-6"
  >
    <div v-for="campo in camposFormulario" :key="campo.nombre" class="space-y-2">
  <label :for="campo.nombre" class="block text-gray-700 font-medium">
    {{ formatearNombreCampo(campo.nombre) }}
  </label>

  <input
    v-if="campo.tipo !== 'checkbox'"
    :type="campo.tipo === 'número' ? 'number' : campo.tipo"
    :id="campo.nombre"
    v-model="datosFormulario[campo.nombre]"
    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
  />

  <input
    v-else
    type="checkbox"
    :id="campo.nombre"
    v-model="datosFormulario[campo.nombre]"
    class="h-5 w-5 text-blue-600"
  />
</div>

    <button
      type="submit"
      class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200 shadow"
    >
      Guardar
    </button>
  </form>
</div>

<div v-else class="text-center mt-10 text-gray-500">
  <p>No hay campos definidos para este rol o aún no se cargaron.</p>
</div>

</template>

<script>
import axios from 'axios';

export default {
  props: {
    idUsuario: {
    type: Number,
    required: true
  }
  },
  data() {
    return {
      nombreRol: '',
      camposFormulario: [], // ahora será un array de objetos { nombre, tipo }
      datosFormulario: {}
    };
  },
  mounted() {
    this.cargarCamposDinamicos();
  },
  methods: {
    cargarCamposDinamicos() {
  axios.get(`${import.meta.env.VITE_API_URL}/api/campos-dinamicos/${this.idUsuario}`)
    .then(res => {
      this.nombreRol = res.data.rol;

      this.camposFormulario = res.data.campos.map(campo => {
        if (typeof campo === 'object' && campo.nombre && campo.tipo) return campo;
        return { nombre: campo, tipo: 'texto' }; // por si vienen como strings
      });

      this.datosFormulario = {};
      this.camposFormulario.forEach(campo => {
        this.datosFormulario[campo.nombre] = campo.tipo === 'checkbox' ? false : '';
      });
    })
    .catch(err => {
      console.error('Error al cargar los campos dinámicos:', err);
    });
},

    guardarDatosRol() {
        const datosPlano = JSON.parse(JSON.stringify(this.datosFormulario));

      axios.post(`${import.meta.env.VITE_API_URL}/api/datos-roles`, {
        ID_UserRolEscuela: this.idUsuario,
        Datos: datosPlano
      })
      .then(() => {
        alert('Datos guardados correctamente.');
      })
      .catch(err => {
        console.error('Error al guardar los datos del rol:', err);
      });
    },
    formatearNombreCampo(nombreCampo) {
      return nombreCampo.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
    }
  }
};
</script>

<style scoped>
/* Opcional: estilos personalizados */
</style>
