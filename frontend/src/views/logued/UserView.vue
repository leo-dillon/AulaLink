<script setup>

    import { onMounted, provide, ref } from 'vue'
    import { RouterView } from 'vue-router'
    import Sidebar from '../../components/user/SideBar.vue'
    import axios from 'axios'
    
    let userSchool = ref(undefined)
    const userData = JSON.parse(localStorage.getItem('dataUser'))  
    
    onMounted( async () => {
        let response = await axios.get(`${import.meta.env.VITE_API_URL}/api/user/${userData.id}/escuela`);
        console.log(response.data)
        userSchool.value = response.data
    })
    
    provide('user_school', userSchool)
    provide('userData', userData)
</script>

<template>
    <div class="bg-gray-100 flex">
        <Sidebar escuela="userSchool"/>
        <!-- Router view => Modificación de página sin recargar -->
        <RouterView />
    </div>
</template>
