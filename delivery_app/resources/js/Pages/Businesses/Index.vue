<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';
import { Link as InertiaLink } from '@inertiajs/vue3';

const { businesses } = usePage().props
</script>

<template>
    <Layout>
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-1">
                <h1 class="text-2xl font-semibold">Negocios</h1>
                <InertiaLink href="/admin/categories/create"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Agregar Negocio
                </InertiaLink>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre Negocio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo Negocio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Direccion</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Numero Telefono</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Apertura</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cierre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prom Calif</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="business in businesses" :key="business.id">
                            <td class="px-4 py-2">{{ business.id }}</td>
                            <td class="px-4 py-2">{{ business.name }}</td>
                            <td class="px-4 py-2">{{ business.business_type }}</td>
                            <td class="px-4 py-2">{{ business.address }}</td>
                            <td class="px-4 py-2">{{ business.phone_number }}</td>
                            <td class="px-4 py-2">{{ business.opening }}</td>
                            <td class="px-4 py-2">{{ business.closing }}</td>
                            <td class="px-4 py-2">{{ business.average_rating }}</td>
                            <td class="px-4 py-2 flex space-x-2">
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