<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';
import { Link as InertiaLink } from '@inertiajs/vue3';

const { categories } = usePage().props;
</script>

<template>
    <Layout>
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-1">
                <h1 class="text-2xl font-semibold">Categorías</h1>
                <InertiaLink href="/admin/categories/create"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Agregar Categoría
                </InertiaLink>
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
                                <InertiaLink href="#" class="bg-red-500 text-white px-4 py-2 rounded-lg">Eliminar
                                </InertiaLink>
                                <InertiaLink href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Editar
                                </InertiaLink>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>

<style scoped></style>
