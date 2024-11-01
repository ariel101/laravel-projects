<script setup>
    import '@fortawesome/fontawesome-free/css/all.min.css';
</script>

<template>
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 px-4 mt-5">
      <div class="bg-white p-1 rounded-lg shadow-md h-24">
        <h2 class="text-base md:text-lg font-semibold mt-0 ml-8">Ventas Totales</h2>
        <div class="flex items-center">
          <div class="bg-blue-500 w-12 h-12 md:w-16 md:h-16 rounded-full ml-3 flex items-center justify-center">
            <i class="fas fa-dollar-sign text-white text-full icon"></i>
          </div>
          <p class="text-xl md:2xl ml-2">2500.00 $</p>
        </div>
      </div>
      <div class="bg-white p-1 rounded-lg shadow-md h-24">
        <h2 class="text-base md:text-lg font-semibold mt-0 ml-8">Total Ordenes</h2>
        <div class="flex items-center">
          <div class="bg-green-500 w-12 h-12 md:w-16 md:h-16 rounded-full ml-3 flex items-center justify-center">
            <i class="fas fa-receipt text-white text-full icon"></i>
          </div>
          <p class="text-xl md:2xl ml-2">550</p>
        </div>
      </div>
      <div class="bg-white p-1 rounded-lg shadow-md h-24">
        <h2 class="text-base md:text-lg font-semibold mt-0 ml-8">Total Clientes</h2>
        <div class="flex items-center">
          <div class="bg-orange-500 w-12 h-12 md:w-16 md:h-16 rounded-full ml-3 flex items-center justify-center">
            <i class="fas fa-users text-white text-full icon"></i>
          </div>
          <p class="text-xl md:2xl ml-2">245</p>
        </div>
      </div>
      <div class="bg-white p-1 rounded-lg shadow-md h-24">
        <h2 class="text-base md:text-lg font-semibold mt-0 ml-8">Tiendas</h2>
        <div class="flex items-center">
          <div class="bg-pink-500 w-12 h-12 md:w-16 md:h-16 rounded-full ml-3 flex items-center justify-center">
            <i class="fas fa-store text-white text-full icon"></i>
          </div>
          <p class="text-xl md:2xl ml-2">67</p>
        </div>
      </div>
    </div>
</template>

<style scoped>
.icon{
    font-size: 30px;
  }
</style>