<template>
    <div>
      <p>Ruta generada: {{ userRoute }}</p>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { route } from 'ziggy-js';
  
  const userRoute = ref(route('user.show', { id: 1 }));
  </script>
  