<script setup lang="ts">
import { inject} from 'vue';
    import { RouterLink } from 'vue-router';
    import AsignarUsuarioEscuela from '../UsuarioConEscuela/AsignarUsuarioEscuela.vue';
    import FormularioRoles from '../UsuarioConEscuela/formularioRoles.vue';
    const userData = inject('userData')
    const userName = userData?.id;
</script>


<template>
    <section>
        <h2>
            Bienvenido
        </h2>
        <AsignarUsuarioEscuela/>    
                         <!-- Hacer que use (userName) y funcione con el id de usuario y no con el id de la tabla -->
        <FormularioRoles :idUsuario="6" />
        <RouterLink to="/editar">
            Editar Usuario 
        </RouterLink>
    </section>
</template>