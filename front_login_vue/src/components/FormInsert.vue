<script setup>
import {onMounted, ref} from 'vue'
import axiosInstance from '../service/axios'
import { usePropietarioStore } from '@/store/propietarios';

    const nombre = ref('');
    const genero = ref('');
    const raza = ref('')
    const edad = ref('')
    const propietario = ref('')
    const direccion = ref('')

    const propietarioStore = usePropietarioStore();

    const insert = async ()=>{
        try {
            const response = await axiosInstance.post('/mascota',{
                nombre: nombre.value,
                genero: genero.value,
                raza: raza.value,
                edad: edad.value,
                propietarioId: propietario.value,
                direccion: direccion.value
            })
            console.log('respuesta del servidor',response.data)
        } catch (error) {
            console.error('error al registrar nueva mascota',error)
        }
    }

    onMounted(() => {
        propietarioStore.fetchPropietarios()
    });
</script>

<template>
    <div>
        <h1>Insertar Mascotas</h1>
        <form @submit.prevent="insert">
            <div>
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" v-model="nombre" id="nombre">
            </div>
            <div>
                <label for="Genero">Genero</label>
                <select name="genero" v-model="genero" id="genero">
                    <option value="M">M</option>
                    <option value="E">E</option>
                </select>
            </div>
            <div>
                <label for="raza">Raza</label>
                <input type="text" name="raza" v-model="raza" id="raza">
            </div>
            <div>
                <label for="edad">Edad</label>
                <input type="number" name="edad" v-model="edad" id="edad">
            </div>
            <div>
                <label for="propietario">Propietario</label>
                <select name="propietario" v-model="propietario" id="propietario">
                    <option v-for="prop in propietarioStore.propietarios" :key="prop.id" :value="prop.id">{{ prop.nombre }}</option>
                </select>
            </div>
            <div>
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" v-model="direccion" id="direccion">
            </div>
            <div>
                <button type="submit">Insertar</button>
            </div>
        </form>
    </div>
</template>

<style scoped>
</style>