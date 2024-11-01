<template>
    <div class="topbar">
      <div class="logo">Delivery Admin</div>
      <div class="profile">
        <span>Welcome, Admin</span>
        <img src="profile-pic-url" alt="Profile Picture">
      </div>
    </div>
  </template>
  
  <script setup>
  
  </script>
  
  <style scoped>
  .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #444;
    color: #fff;
    padding: 10px 20px;
  }
  .topbar .logo {
    font-size: 24px;
  }
  .topbar .profile {
    display: flex;
    align-items: center;
  }
  .topbar .profile img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-left: 10px;
  }
  </style>
  