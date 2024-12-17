<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';

// Props para recibir el estado del modal y el evento para cerrarlo
const props = defineProps({
    showModal: Boolean,
    categories: Array
});
const emit = defineEmits(['close', 'refreshProducts']);

const name = ref('');
const category = ref('');
const description = ref('');
const image_path = ref(null);


// Manejo de archivo de imagen
const handleFileUpload = (event) => {
    const file = event.target.files[0];
    image_path.value = file;
};

// Enviar formulario
const submit = async () => {
    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('category_id', category.value);
    formData.append('description', description.value);
    if (image_path.value) {
        formData.append('image_path', image_path.value);
    }

    try {
        await axios.post('/products', formData);
        emit('refreshProducts'); // Dispara un evento para actualizar la lista de productos
        emit('close'); // Cierra el modal
    } catch (error) {
        console.error('Error al registrar el producto:', error.response.data);
    }
};
</script>

<template>
    <div v-if="showModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-11/12 sm:w-2/3 lg:w-1/3 p-6 relative">
            <button @click="$emit('close')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                ✖
            </button>
            <h2 class="text-2xl font-bold mb-6 text-center">Registrar Producto</h2>
            <form @submit.prevent="submit">
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input v-model="name" type="text" id="name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <!-- Categoría -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select v-model="category" id="category"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option v-for="cat in categories" :key="cat.id" :value="cat.id">
                            {{ cat.name }}
                        </option>
                    </select>
                </div>
                <!-- Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea v-model="description" id="description" rows="4"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <!-- Imagen -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
                    <input @change="handleFileUpload" type="file" id="image"
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
