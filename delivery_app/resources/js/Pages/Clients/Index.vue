<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';

const {clients} = usePage().props;
</script>
<template>
    <Layout>
        <div class="container mx-auto px-2">
            <div class="flex justify-between items-center py-1">
                <h1 class="font-semibold text-2xl">Clientes</h1>
                <button @click="showModal = true"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Crear Cliente
                </button>
            </div>
            <div>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="client in clients " :key="client.id">
                            <td>{{ client.id }}</td>
                            <td>{{ client.name }}</td>
                            <td>{{ client.lastname }}</td>
                            <td>{{ client.email }}</td>
                            <td>{{ client.phone_number }}</td>
                            <td>{{ client.address }}</td>
                            <td>
                                <button @click="deleteDriver(driver.id)"
                                    class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-4 py-2">
                                    Eliminar
                                </button>
                                <button @click="editDrivers(driver)"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
</style>