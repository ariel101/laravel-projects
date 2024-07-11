<!-- src/components/Sidebar.vue -->
<template>
    <aside class="sidebar">
      <ul>
        <li><router-link to="/">Dashboard</router-link></li>
        <li><router-link to="/users">Users</router-link></li>
        <li><router-link to="/settings">Settings</router-link></li>
        <li><router-link to="/mascotas">Mascotas</router-link></li>
      </ul>
    </aside>
</template>
  
<script setup>

</script>
  
<style scoped>
  .sidebar {
    background: #f4f4f4;
    padding: 15px;
    width: 200px;
  }
  .sidebar ul {
    list-style: none;
    padding: 0;
  }
  .sidebar ul li {
    margin: 10px 0;
  }
</style>
  