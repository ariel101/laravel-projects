<template>
    <div class="flex h-screen">
      <!-- Sidebar -->
      <Sidebar />
      <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Navbar -->
        <Navbar />
        <StatisticGrid />
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-6 rounded-md mt-2">
          <slot />
          
        </main>
      </div>
    </div>
  </template>
  
  <script>
  import Sidebar from './Sidebar.vue'
  import Navbar from './NavBar.vue';
  import StatisticGrid from './StatisticGrid.vue';
  
  export default {
    components: {
      Sidebar,
      Navbar,
      StatisticGrid
    },
  }
  </script>
  
  <style scoped>
  /* Puedes agregar estilos personalizados aquí */
  </style>
  