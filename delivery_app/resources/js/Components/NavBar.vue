<template>
  <div class="bg-white shadow-md py-4 px-6 flex justify-between items-center border-b-3">
    <h1 class="text-xl font-bold">Admin Dashboard</h1>
    <div>
      <!-- Enlaces del menú de usuario o acciones rápidas -->
      <div class="relative w-58">
        <input type="text" name="buscar" id="buscar"
          class="rounded-full border border-gray-300 p-2 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-blue-200 h-9"
          placeholder="Buscar">
        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
      </div>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
/* Estilos para el navbar */
</style>