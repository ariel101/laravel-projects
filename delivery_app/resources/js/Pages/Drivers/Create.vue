<script setup>
import { useForm } from '@inertiajs/vue3';
//import { route } from 'vendor/tightenco/ziggy/src/js';
import { ref } from 'vue';

const props = defineProps({
    showModal: Boolean
});
const emit = defineEmits(['close', 'refreshProducts']);

const form = useForm({
    name: '',
    lastname: '',
    email: '',
    password: '',
    phone_number: '',
    vehicle: '',
    placa: ''
})

const submit = async()=>{
    try {
        console.log("estos son los datos antes de enviarse:", form);
        form.post(route('drivers.store'),{
            onSuccess: ()=>{
                emit('close')
                emit('refreshProducts');
                alert('repartidor creado correctamente')
                console.log('formulario enviado con exito')
            },
            onError: (errors)=>{
                console.log('errores al crear el repartidor', errors)
            }
        })
    } catch (error) {
        console.error('error inesperado al enviar el formulario', error)
    }
}
</script>

<template>
    <div v-if="showModal" class=" fixed inset-0 bg-gray-800 flex items-center justify-center bg-opacity-75 z-50 border-rounded">
        <div class="bg-white rounded-lg shadow-lg w-11/12 sm:w-2/3 lg:w-1/3 p-6 relative max-h-screen overflow-auto">
            <button @click="$emit('close')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                ✖
            </button>
            <h2 class="text-2xl font-bold mb-6 text-center">Agregar Repartidor</h2>
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label for="nombre" class="block text-gray-700">Nombre</label>
                    <input v-model="form.name" type="text" id="nombre" name="nombre"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="apellido" class="block text-gray-700">Apellido</label>
                    <input v-model="form.lastname" type="text" id="apellido"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="correo" class="block text-gray-700">Correo</label>
                    <input v-model="form.email" type="email" id="correo" 
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input v-model="form.password" type="password" id="password" name="password"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="telefono" class="block text-gray-700">Teléfono</label>
                    <input v-model="form.phone_number" type="tel" id="telefono" name="telefono"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="vehiculo" class="block text-gray-700">Vehículo</label>
                    <input v-model="form.vehicle" type="text" id="vehiculo" name="vehiculo"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="placa" class="block text-gray-700">Placa</label>
                    <input v-model="form.placa" type="text" id="placa" name="placa"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped></style>