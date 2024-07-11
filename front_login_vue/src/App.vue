<!-- src/App.vue -->
<template>
  <div id="app">
    <NavBar />
    <div class="container">
      <Sidebar />
      <main class="main-content">
        <router-view />
      </main>
    </div>
  </div>
</template>

<script setup>
import NavBar from './components/NavBar.vue';
import Sidebar from './components/Sidebar.vue';
</script>

<style scoped>
/* Estilos globales para tu aplicación */
#app {
  display: flex;
  flex-direction: column;
  height: 100vh;
}
.container {
  display: flex;
  flex: 1;
}
.main-content {
  flex: 1;
  padding: 20px;
  overflow-y: auto;
}
@media (max-width: 600px) {
  .container {
    flex-direction: column;
  }
  .main-content {
    padding: 10px;
  }
}
</style>
