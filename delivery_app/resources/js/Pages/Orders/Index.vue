<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';
const {orders} = usePage().props
</script>

<template>
    <Layout>
        <div class="container mx-auto px-2">
            <div class="flex justify-between items-center py-1">
                <h1 class="font-semibold text-2xl">Pedidos</h1>
                <button @click="showModal = true"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Crear Pedido
                </button>
            </div>
            <div>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th>Id</th>
                            <th>cliente</th>
                            <th>Driver</th>
                            <th>direccion pedido</th>
                            <th>Cantidad</th>
                            <th>estado</th>
                            <th>Fecha de Pedido</th>
                            <th>Fecha entrega Prevista</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="order in orders " :key="order.id">
                            <td>{{ order.id }}</td>
                            <td>{{ order.client_id }}</td>
                            <td>{{ order.driver_id }}</td>
                            <td>{{ order.delivery_address }}</td>
                            <td>{{ order.total_amount }}</td>
                            <td>{{ order.status }}</td>
                            <td>{{ order.order_datetime }}</td>
                            <td>{{ order.delivery_datetime }}</td>
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

<style scoped></style>