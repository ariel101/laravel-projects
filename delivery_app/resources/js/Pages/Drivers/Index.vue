<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';
import { Link as InertiaLink } from '@inertiajs/vue3';

const { drivers } = usePage().props

</script>

<template>
    <Layout>
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2">
                <h1 class="font-semibold text-2xl">Repartidores</h1>
                <InertiaLink href="joj" class="bg-green-500 text-white rounded-lg px-4 py-2 hover:bg-green-700">
                    Nuevo Repartidor
                </InertiaLink>
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
                            <th>Vehiculo</th>
                            <th>Placa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="driver in drivers " :key="driver.id">
                            <td>{{ driver.id }}</td>
                            <td>{{ driver.name }}</td>
                            <td>{{ driver.lastname }}</td>
                            <td>{{ driver.email }}</td>
                            <td>{{ driver.phone_number }}</td>
                            <td>{{ driver.vehicle }}</td>
                            <td>{{ driver.placa }}</td>
                            <td>
                                <InertiaLink class="bg-red-500 text-white hover:bg-red-600">
                                    Eliminar
                                </InertiaLink>
                                <InertiaLink class="bg-blue-500 text-white hover:bg-blue-600">
                                    Editar
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