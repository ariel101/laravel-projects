<!-- src/components/NavBar.vue -->
<template>
    <nav class="navbar">
      <div class="navbar-brand">Admin Panel</div>
      <ul class="navbar-menu">
        <li><router-link to="/">Dashboard</router-link></li>
        <li><router-link to="/users">Users</router-link></li>
        <li><router-link to="/settings">Settings</router-link></li>
      </ul>
    </nav>
  </template>
  
  <script setup>
  
  </script>
  
  <style scoped>
  .navbar {
  background: #333;
  color: #fff;
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.navbar-logo {
  font-size: 1.5rem;
}
.navbar-toggle {
  display: none;
  font-size: 1.5rem;
  background: none;
  border: none;
  color: #fff;
  cursor: pointer;
}
.navbar-menu {
  list-style: none;
  display: flex;
  gap: 15px;
}
.navbar-menu li a {
  color: #fff;
  text-decoration: none;
}
@media (max-width: 600px) {
  .navbar-menu {
    display: none;
    flex-direction: column;
    gap: 0;
    background: #333;
    width: 100%;
    position: absolute;
    top: 60px;
    left: 0;
  }
  .navbar-menu.active {
    display: flex;
  }
  .navbar-toggle {
    display: block;
  }
}
  </style>
  