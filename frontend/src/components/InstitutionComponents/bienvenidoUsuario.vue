<script setup lang="ts">
    import { RouterLink } from 'vue-router';
    import AsignarUsuarioEscuela from '../UsuarioConEscuela/AsignarUsuarioEscuela.vue';
    import FormularioRoles from '../UsuarioConEscuela/formularioRoles.vue';
</script>


<template>
    <section>
        <h2>
            Bienvenido
        </h2>
        <AsignarUsuarioEscuela/>
        <FormularioRoles :idUsuario="4" />
        <RouterLink to="/editar">
            Editar Usuario 
        </RouterLink>
    </section>
</template>