<template>
  <Layout>
    <div>
      <div class="flex justify-between items-center py-1">
        <h1 class="text-2xl font-semibold">Productos</h1>
        <button @click="showModal = true" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
          Agregar Producto
        </button>
      </div>
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              id</th>
            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Nombre</th>
            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Categoria</th>
            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Descripcion
            </th>
            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Imagen</th>
            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="product in products" :key="product.id">
            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ product.id }}</td>
            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.name }}</td>
            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.category_id }}</td>
            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.description }}</td>
            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500"><img :src="product.image_path"
                alt="Product Image" width="100"></td>
            <td class=" py-2 flex space-x-2">
              <button @click="deleteProduct(product.id)"
                class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-4 py-2">
                Eliminar
              </button>
              
              <button @click="editOpenModal(product)" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                Editar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- Modal, pasamos el prop categories recibido del controlador a Create.vue -->
      <Create 
      :showModal="showModal"
      :categories="categories"
      @close="showModal = false" 
      @refreshProducts="refreshProducts" />

      <Edit
      :showModal="showEditModal"
      :categories="categories"
      :product="selectProduct"
      @close="showEditModal = false"
      @refreshProducts="refreshProducts"

      />
    </div>
  </Layout>
</template>

<script setup>
import { Link as InertiaLink, usePage } from '@inertiajs/vue3';
import Layout from '@/Components/Layout.vue';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import Create from '../Products/Create.vue';
import Edit from '../Products/Edit.vue';

const { products } = usePage().props
const { categories } = usePage().props; //recibimos el prop del controlador ProductController
const refreshProducts = () => {
    location.reload(); // Refresca la página después de agregar un producto
};
const showModal = ref(false)
const showEditModal = ref(false)
const selectProduct = ref({})

const deleteProduct = (productId) => {
  if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
    Inertia.delete(route('products.destroy', productId), {
      onSuccess: () => {
        // Actualiza la lista de productos localmente después de eliminar
        products.value = products.value.filter(product => product.id !== productId);
      }
    });
  }
};

const editOpenModal= (product)=>{
  console.log("metodo modal ejecutado", product)
  showEditModal.value = true
  selectProduct.value = {...product} 
  
}
</script>
