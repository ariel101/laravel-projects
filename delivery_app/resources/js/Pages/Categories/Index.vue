<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import Create from '../Categories/Create.vue'
import Edit from '../Categories/Edit.vue'

const { categories } = usePage().props;

const showModal = ref(false);
const showEditModal = ref(false)
const selectCategories = ref({})

const editCategories = (category)=>{
    showEditModal.value = true
    selectCategories.value = {...category}
}

const deleteCategories = (idCategories)=>{
    if(confirm('¿Estas seguro de elimiar la Categoria?')){
        Inertia.delete(route('categories.destroy', idCategories), {
            preserveScroll: true,
            onSuccess: ()=>{
                alert('Categoria eliminado de manera correcta')
                categories.value = categories.value.filter(categories => categories.id !== categories.id)
            }
        })
    }
}
</script>

<template>
    <Layout>
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-1">
                <h1 class="text-2xl font-semibold">Categorías</h1>
                <button @click="showModal = true"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Crear Categoria
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre Categoría</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="category in categories" :key="category.id">
                            <td class="border px-4 py-2">{{ category.id }}</td>
                            <td class="border px-4 py-2">{{ category.name }}</td>
                            <td class="border px-4 py-2 flex space-x-2">
                                <button @click="deleteCategories(category.id)"
                                    class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-4 py-2">
                                    Eliminar
                                </button>
                                <button @click="editCategories(category)"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Create
            :showModal = "showModal"
            @close = "showModal=false"
            />

            <Edit
            :showModal = "showEditModal"
            :selectCategories = "selectCategories"
            @close = "showEditModal = false"
            />
        </div>
    </Layout>
</template>

<style scoped></style>
