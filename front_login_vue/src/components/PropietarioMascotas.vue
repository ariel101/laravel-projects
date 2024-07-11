<script setup>
import { ref, onMounted } from 'vue'
import axiosInstance from '@/service/axios'
const users = ref([]);
const fetchUsers = async () => {
    try {
        const response = await axiosInstance.get('/mascota');
        users.value = response.data;
    } catch (error) {
        console.error('error en la solicitud:', error)
    }
}

onMounted(() => {
    fetchUsers()
})
</script>

<template>
    <div>
        <h1>Lista de Usuarios</h1>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Propietario</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.nombre }}</td>
                    <td>{{ user.genero }}</td>
                    <td>{{ user.raza }}</td>
                    <td>{{ user.edad }}</td>
                    <td>{{ user.propietarioId }}</td>
                    <td>{{ user.direccion }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped></style>