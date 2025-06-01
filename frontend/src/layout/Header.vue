<script setup>
    import BurgerMenu from '@/svg/BurgerMenu.vue';
    import Close from '@/svg/Close.vue';
    import User from '@/svg/User.vue';
    import { ref } from 'vue';
    import { RouterLink } from 'vue-router';
    const login = localStorage.getItem('dataUser')
    const isOpen = ref(false)
    const links = [
        { text: 'Inicio',           to: '/'               },
        { text: 'Sobre Nosotros',   to: '/sobreNosotros' },
        { text: 'Contacto',         to: '/contacto' },
        { text: 'Ingresar',         to: '/iniciar-sesion' }
    ]
    const logout = async () => {
        localStorage.clear('dataUser')
        location.href = "/"
    }

</script>
<template>
    <header class="fixed top-0 left-0 w-full z-50 flex items-center justify-center shadow-xl bg-[#FFD43B]">
        <div class="w-full px-1 lg:px-4 h-15 lg:h-20 flex justify-between items-center">

            <RouterLink to="/" class=" pr-4 flex items-end gap-3" title="Logo Aula Link">
                <img class="w-16" src="/img/logo/LogoSinTexto.png" alt="Aulalink">
                <h1 class="text-xl lg:text-3xl font-bold text-gray-800 "> Aula Link </h1>
            </RouterLink>
            <nav class="flex items-center justify-betweendv gap-6 text-sm md:text-base">
                <div v-if="login">
                        <RouterLink 
                        to="#" 
                        @click="logout" 
                        class="flex items-center disabled px-2 lg:px-4 py-2 text-black text-md lg:text-lg border rounded-2xl border-red-500 font-semibold opacity-70 hover:opacity-100 hover:bg-red-400/50 transition"
                        title="Cerrar sesión"
                        >
                        Cerrar sesión
                    </RouterLink>
                </div>
                <div v-if="!login" class="hidden sm:flex gap-2 lg:gap-4">
                    <RouterLink
                        v-for="(item, index) in links"
                        :key="index"
                        class="flex items-center disabled px-2 lg:px-4 py-2 text-black text-md lg:text-lg font-semibold opacity-70 hover:opacity-100 hover:border-b-2 transition"
                        :to="item.to"
                    >
                        {{ item.text }}
                        <User v-if="item.text === 'Ingresar'" width="24" height="24" />
                    </RouterLink>
                </div>
                <div class="movile">
                    <button @click="isOpen = true" class="sm:hidden px-4 py-2 cursor-pointer hover:scale-110">
                        <BurgerMenu width="24" height="24"/>
                    </button>
                    <div v-if="!login && isOpen" class="w-screen h-screen top-0 left-0 pt-16 fixed sm:hidden flex-col items-center space-y-2 bg-[#FFD43B] lg:gap-4">
                        <RouterLink
                            v-for="(item, index) in links"
                            :key="index"
                            class="flex items-center justify-center px-2 lg:px-4 py-2 text-black text-xl lg:text-2xl font-semibold opacity-70 hover:opacity-100 hover:bg-white/50 transition"
                            :to="item.to"
                        >
                            {{ item.text }}
                            <User v-if="item.text === 'Ingresar'" width="24" height="24" class="ml-3"/>
                        </RouterLink>
                        <button>
                            <Close class="absolute top-4 right-4 p-1 rounded-full hover:bg-white/50 cursor-pointer" width="36" height="36" @click="isOpen = false"/>
                        </button>
                    </div>
                </div>
            </nav>
        </div>  
    </header>

</template>