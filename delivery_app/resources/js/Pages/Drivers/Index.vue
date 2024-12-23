<script setup>
import Layout from '@/Components/Layout.vue';
import { usePage } from '@inertiajs/vue3';
import { Link as InertiaLink } from '@inertiajs/vue3';
import { ref } from 'vue';
import Create from '../Drivers/Create.vue'
import Edit from '../Drivers/Edit.vue'
import { Inertia } from '@inertiajs/inertia';

const { drivers } = usePage().props

const showModal = ref(false);
const showEditModal = ref(false);
const refreshProducts = () => {
    location.reload(); // Refresca la página después de agregar un producto
};
const selectDriver = ref({})

const editDrivers = (driver)=>{
    console.log('modal abierto', driver);
    showEditModal.value = true
    selectDriver.value = {...driver}
}

const deleteDriver = (idDriver)=>{

    if(confirm('¿estas seguro de elimiar el repartidor?')){
        Inertia.delete(route('drivers.destroy', idDriver),{
            preserveScroll:true,
            onSuccess: ()=>{
                drivers.value = drivers.value.filter(drivers => drivers.id !== drivers.id)
            }
        })
    }
}
</script>

<template>
    <Layout>
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-1">
                <h1 class="font-semibold text-2xl">Repartidores</h1>
                <button @click="showModal = true"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Agregar Repartidor
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
            <Create :showModal="showModal" @close="showModal = false" @refreshProducts="refreshProducts" />

            <Edit 
            :showEditModal = "showEditModal"
            :selectEditDriver = "selectDriver"
            @close = "showEditModal=false"
            />
        </div>

    </Layout>
</template>

<style scoped></style>