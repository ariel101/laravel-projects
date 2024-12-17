<script setup>
import { reactive, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  showModal: Boolean,
  categories: Array,
  product: {
    type: Object,
    default: () => ({}) // Valor por defecto para evitar undefined
  }
});

const emit = defineEmits(['close', 'refreshProducts']);

const form = useForm({
  id: props.product.id,
  name: props.product.name,
  category_id: props.product.category_id,
  description: props.product.description,
  image_path: props.product.image_path,
});
console.log("Formulario inicializado:", form);

// Observar cambios en el prop product y actualizar el formulario
watch(() => props.product, (newProduct) => {
  form.id = newProduct.id;
  form.name = newProduct.name;
  form.category_id = newProduct.category_id;
  form.description = newProduct.description;
  form.image_path = newProduct.image_path;
  console.log("Formulario actualizado con nuevos datos del producto:", form);
}, { immediate: true });

const submit = async () => {
  try {
    console.log("los datos antes de ser enviados:", form)
    form.put(route('products.update', form.id), {
      preserveScroll: true,
      onSuccess: () => {
        emit('close');
        emit('refreshProducts');
        alert('Producto actualizado correctamente');
      },
      onError: (errors) => {
        console.error('Errores al actualizar el producto:', errors);
      }
    });
  } catch (error) {
    console.error('Error inesperado al enviar el formulario:', error);
  }
};

</script>

<template>
  <div v-if="showModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 sm:w-2/3 lg:w-1/3 p-6 relative">
      <button @click="$emit('close')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
        ✖
      </button>
      <h2 class="text-2xl font-bold mb-6 text-center">Editar Producto</h2>
      <form @submit.prevent="submit">
        <!-- Nombre -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
          <input v-model="form.name" type="text" id="name"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
        </div>
        <!-- Categoría -->
        <div class="mb-4">
          <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
          <select v-model="form.category_id" id="category"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <option v-for="cat in categories" :key="cat.id" :value="cat.id">
              {{ cat.name }}
            </option>
          </select>
        </div>
        <!-- Descripción -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
          <textarea v-model="form.description" id="description" rows="4"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <!-- Imagen -->
        <div class="mb-6">
          <label for="image" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
          <input v-model="form.image_path" type="text" id="image"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
        </div>
        <div class="flex items-center justify-end">
          <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Guardar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped></style>