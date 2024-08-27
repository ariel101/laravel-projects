<!-- src/components/EditPetForm.vue -->
<template>
    <div>
      <h1>Editar Mascota</h1>
      <form @submit.prevent="updatePet">
        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" v-model="nombre" required />
        </div>
        <div>
          <label for="genero">Género:</label>
          <select id="genero" v-model="genero" required>
            <option value="M">M</option>
            <option value="E">E</option>
          </select>
        </div>
        <div>
          <label for="raza">Raza:</label>
          <input type="text" id="raza" v-model="raza" required />
        </div>
        <div>
          <label for="edad">Edad:</label>
          <input type="number" id="edad" v-model="edad" required />
        </div>
        <div>
          <label for="propietario">Propietario:</label>
          <select id="propietario" v-model="propietario" required>
            <option v-for="prop in propietarioStore.propietarios" :key="prop.id" :value="prop.id">{{ prop.nombre }}</option>
          </select>
        </div>
        <div>
          <label for="direccion">Dirección:</label>
          <input type="text" id="direccion" v-model="direccion" required />
        </div>
        <button type="submit">Actualizar</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { useRoute, useRouter } from 'vue-router';
  import axiosInstance from '../service/axios';
  import { usePropietarioStore } from '@/store/propietarios';
  
  const route = useRoute();
  const router = useRouter();
  
  const nombre = ref('');
  const genero = ref('');
  const raza = ref('');
  const edad = ref('');
  const propietario = ref('');
  const direccion = ref('');
  
  const propietarioStore = usePropietarioStore();
  
  const fetchPet = async () => {
    try {
      const response = await axiosInstance.get(`/mascotas/${route.params.id}`);
      const pet = response.data;
      nombre.value = pet.nombre;
      genero.value = pet.genero;
      raza.value = pet.raza;
      edad.value = pet.edad;
      propietario.value = pet.propietario_id;
      direccion.value = pet.direccion;
    } catch (error) {
      console.error('Error al obtener la mascota:', error);
    }
  };
  
  const updatePet = async () => {
    try {
      await axiosInstance.put(`/mascotas/${route.params.id}`, {
        nombre: nombre.value,
        genero: genero.value,
        raza: raza.value,
        edad: edad.value,
        propietario_id: propietario.value,
        direccion: direccion.value,
      });
      router.push('/pets'); // Redirige a la lista de mascotas después de actualizar
    } catch (error) {
      console.error('Error al actualizar la mascota:', error);
    }
  };
  
  onMounted(() => {
    propietarioStore.fetchPropietarios();
    fetchPet();
  });
  </script>
  