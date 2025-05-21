<script setup>
  import TheWelcome from '../components/TheWelcome.vue'
  import MainInstitutionSubjects from '../components/InstitutionComponents/MainInstitutionSubjects.vue'
  import Sidebar from '../components/InstitutionComponents/Sidebar.vue'

</script>

<template>
  <main>
    <TheWelcome />

    <div class="bg-gray-100 min-h-screen flex">
      <Sidebar/>
      <MainInstitutionSubjects/>
    </div>
    
  </main>
</template>
