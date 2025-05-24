<script setup>
    import { RouterLink } from 'vue-router';
    const login = localStorage.getItem('dataUser')

    const logout = async () => {
        localStorage.clear('dataUser')
        location.href = "/"
    }

</script>
<template>
    <header class="h-12 px-8 flex items-center justify-between border-b">
        <RouterLink to="/"> 
            <h1>Aulalink</h1>
        </RouterLink>
        <nav class="flex gap-8 ">
            <div v-if="login">
                <RouterLink to="#" @click="logout"> cerrar sesión </RouterLink>
            </div>
            <div v-if="!login">
                <RouterLink to="/iniciar-sesion"> iniciar sesión </RouterLink>
            </div>
        </nav>
    </header>
</template>