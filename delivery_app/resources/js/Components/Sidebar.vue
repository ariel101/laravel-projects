<template>
  <!-- Sidebar -->
  <div :class="[
    'px-5 w-64 mr-2 text-slate-900 text-left flex flex-col h-full bg-gray-200 transition-all duration-300 fixed lg:relative z-40',
    sidebarOpen || windowWidth >= 1024 ? 'left-0' : '-left-64',
  ]">
    <!-- Header del sidebar -->
    <div class="p-6 text-lg text-green-800 font-semibold text-center border-b border-gray-700">
      RAPIDIN APP
    </div>

    <!-- Opciones de navegación -->
    <nav class="flex-1 p-4">
      <inertia-link :href="route('dashboard')"
        class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-home border-black mr-2"></i>Dashboard
      </inertia-link>
      <inertia-link href="/admin/orders"
        class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-box mr-2"></i>Pedidos
      </inertia-link>
      <inertia-link :href="route('products.index')"
        class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-shopping-cart mr-2"></i>Productos
      </inertia-link>
      <inertia-link :href="route('drivers.index')"
        class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-bicycle mr-2"></i>Repartidores
      </inertia-link>
      <inertia-link :href="route('categories.index')"
        class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-tags mr-2"></i>Categorias
      </inertia-link>
      <inertia-link href="/admin/users" class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-users mr-2"></i>Clientes
      </inertia-link>
      <inertia-link :href="route('businesses.index')"
        class="block py-2 px-4 hover:bg-gray-700 hover:text-slate-50 rounded-full mb-4">
        <i class="fas fa-briefcase mr-2"></i>Negocios
      </inertia-link>
    </nav>

    <!-- Usuario y Logout -->
    <div class="p-4 border-t border-gray-700">
      <div class="flex items-center">
        <img src="" alt="">
        <span class="ml-4">jose maria</span>
        <inertia-link href="/logout" class="ml-auto">
          <i class="fas fa-sign-out-alt text-black"></i>cerrar sesion
        </inertia-link>
      </div>
    </div>
  </div>

  <!-- Botón de menú para pantallas pequeñas -->
  <button @click="toggleSidebar" class="lg:hidden fixed top-4 left-4 text-gray-500 z-50">
    <i class="fas fa-bars text-2xl"></i>
  </button>
</template>

<script setup>
import { Link as InertiaLink } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { ref, onMounted, onBeforeUnmount } from 'vue'

const sidebarOpen = ref(false)
const windowWidth = ref(window.innerWidth)

function toggleSidebar() {
  sidebarOpen.value = !sidebarOpen.value
}

function updateWindowWidth() {
  windowWidth.value = window.innerWidth
}

onMounted(() => {
  window.addEventListener('resize', updateWindowWidth)
})

onBeforeUnmount(() => {
  window.removeEventListener('resize', updateWindowWidth)
})
</script>

<style scoped>

  
</style>
