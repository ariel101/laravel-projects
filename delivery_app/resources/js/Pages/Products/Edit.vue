<script setup>
import { reactive, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';

const props = defineProps({
  showModal: Boolean,
  categories: Array,
  product: {
    type: Object,
    default: () => ({}) // Valor por defecto para evitar undefined
  }
});

const emit = defineEmits(['close', 'refreshProducts']);

// Usar reactive para crear un producto editable
const localProduct = reactive({ ...props.product });
console.log("este el objeto que esta llegando", localProduct.id)

// Observar cambios en el prop product y actualizar el localProduct
watch(() => props.product, (newProduct) => {
  Object.assign(localProduct, newProduct); // Actualiza localProduct, manteniendo la reactividad
}, { immediate: true });

// Función para enviar los datos al servidor
const submit = async () => {
  try {
    if (!localProduct.id) {
      console.error("El producto no tiene un ID válido:", localProduct.id);
      return;
    }

    const formData = new FormData();
    formData.append('name', localProduct.name); // Clave correcta
    formData.append('category_id', localProduct.category_id); // Clave correcta
    formData.append('description', localProduct.description); // Clave correcta
    formData.append('image_path', localProduct.image_path);

    //const url = route('products.update', localProduct.id);
    const url = `/products/${localProduct.id}`;
    console.log('URL generada:', url);
    console.log('Datos enviados:', [...formData.entries()]);

    const response = await axios.put(url, formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      }
    });

    console.log('Respuesta del servidor:', response.data);
    alert('Producto actualizado correctamente');

  } catch (error) {
    if (error.response) {
      console.error('Respuesta del servidor con error:', error.response.data);
    } else if (error.request) {
      console.error('No hubo respuesta del servidor. Solicitud enviada:', error.request);
    } else {
      console.error('Error en la configuración de la solicitud:', error.message);
    }
  }
};

// const handleFileUpload = (event) => {
//   localProduct.image_path = event.target.files[0];
// };
const submitTest = async () => {
  try {
    // Datos de prueba
    const testProductId = 1;
    const formData = new FormData();
    formData.append('name', 'Producto de Prueba desde Consola');
    formData.append('category_id', 2);
    formData.append('description', 'Descripción de Prueba desde Consola');
    formData.append('image_path', new Blob(['imagen de prueba'], { type: 'image/png' }));

    const url = 'http://127.0.0.1:8000/products/1'; // Usa la URL absoluta para asegurarte

    axios.put(url, formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      }
    }).then(response => {
      console.log('Respuesta del servidor:', response.data);
    }).catch(error => {
      if (error.response) {
        console.error('Respuesta del servidor con error:', error.response.data);
      } else if (error.request) {
        console.error('No hubo respuesta del servidor. Solicitud enviada:', error.request);
      } else {
        console.error('Error en la configuración de la solicitud:', error.message);
      }
    });


    console.log('Respuesta del servidor:', response.data);
    alert('Producto de prueba actualizado correctamente');

  } catch (error) {
    if (error.response) {
      console.error('Respuesta del servidor con error:', error.response.data);
    } else if (error.request) {
      console.error('No hubo respuesta del servidor. Solicitud enviada:', error.request);
    } else {
      console.error('Error en la configuración de la solicitud:', error.message);
    }
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
      <form @submit.prevent="submitTest">
        <!-- Nombre -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
          <input v-model="localProduct.name" type="text" id="name"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
        </div>
        <!-- Categoría -->
        <div class="mb-4">
          <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
          <select v-model="localProduct.category_id" id="category"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <option v-for="cat in categories" :key="cat.id" :value="cat.id">
              {{ cat.name }}
            </option>
          </select>
        </div>
        <!-- Descripción -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
          <textarea v-model="localProduct.description" id="description" rows="4"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <!-- Imagen -->
        <div class="mb-6">
          <label for="image" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
          <input v-model="localProduct.image_path" type="text" id="image"
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