<template>
  <Layout>
    <div>
    <h1>Lista de Productos</h1>
    <ul>
      <li v-for="product in products" :key="product.id">{{ product.name }}</li>
      <p>para que quiero que todo esto sea para toda la vida por siempre de los siempre</p>
    </ul>
    <inertia-link :href="route('products.create')">Crear Producto</inertia-link>
  </div>
  </Layout>
</template>

<script setup>
import { Link as InertiaLink } from '@inertiajs/vue3';
import Layout from '@/Components/Layout.vue';
</script>
