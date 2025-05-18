<script setup>
    import { RouterLink } from 'vue-router';
</script>
<template>
    <header class="h-12 px-8 flex items-center justify-between border-b">
        <RouterLink to="/"> 
            <h1>Aulalink</h1>
        </RouterLink>
        <nav class="flex gap-8 ">
                        
            <div>
                <RouterLink to="/iniciar-sesion"> iniciar sesión </RouterLink>
            </div>
        </nav>
    </header>
</template>