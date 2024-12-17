<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, watch } from 'vue';

const prop = defineProps({
    showEditModal: Boolean,
    selectEditDriver: Object
})
const emit = defineEmits(['close', 'refreshProducts']);

const form = useForm({
    id: prop.selectEditDriver.id,
    name: prop.selectEditDriver.name,
    lastname: prop.selectEditDriver.lastname,
    email: prop.selectEditDriver.email,
    password: prop.selectEditDriver.password,
    phone_number: prop.selectEditDriver.phone_number,
    vehicle: prop.selectEditDriver.vehicle,
    placa: prop.selectEditDriver.placa
})
console.log('formulario inicializado con esto valores:', form)

watch(()=>prop.selectEditDriver, (newDriver)=>{

    form.id = newDriver.id;
    form.name = newDriver.name;
    form.lastname = newDriver.lastname;
    form.email = newDriver.email;
    form.password = newDriver.password;
    form.phone_number = newDriver.phone_number;
    form.vehicle = newDriver.vehicle;
    form.placa = newDriver.placa;
},
{
    inmediate: true
})

const submit = ()=>{
    try {
        console.log('datos antes de ser enviados:', form)
        form.put(route('drivers.update', form.id),{
            preserveScroll: true,
            onSuccess: ()=>{
                emit('close')
                alert('repartidor actualizado correctamente')
            },
            onError: (errors)=>{
                console.error('error al actualizar el datos del repartidor:', errors);
            }
        })

    } catch (error) {
        console.error('error inesperado al enviar los datos del repartidor:', error)
    }
}
</script>

<template>
    <div v-if="showEditModal"
        class=" fixed inset-0 bg-gray-800 flex items-center justify-center bg-opacity-75 z-50 border-rounded">
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
                    <input v-model="form.lastname" type="text" id="apellido" name="apellido"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="correo" class="block text-gray-700">Correo</label>
                    <input v-model="form.email" type="email" id="correo" name="correo"
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
                        class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped></style>