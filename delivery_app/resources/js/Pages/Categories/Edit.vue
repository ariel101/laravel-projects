<script setup>
import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

const prop = defineProps({
    showModal: Boolean,
    selectCategories: Object
})
const emit = defineEmits(['close', 'refreshProducts']);

const form = useForm({
    id: prop.selectCategories.id,
    name: prop.selectCategories.name
})

watch(()=>prop.selectCategories, (newCategories)=>{
    form.id = newCategories.id
    form.name = newCategories.name;

},
{
    inmediate: true
}
)

const submit = ()=>{
    try {
        form.put(route('categories.update', form.id),{
            preserveScroll: true,
            onSuccess: ()=>{
                alert('Categoria actualizado de manera correcta')
                emit('close')
            },
            onError: (errors)=>{
                console.error('error al actualizar la categoria:', errors)
            }
        })
    } catch (error) {
        console.error('Error al enviar los datos del formulario:', error)
    }
}
</script>

<template>
    <div v-if="showModal" class=" fixed inset-0 bg-gray-800 flex items-center justify-center bg-opacity-75 z-50 border-rounded">
        <div class="bg-white rounded-lg shadow-lg w-11/12 sm:w-2/3 lg:w-1/3 p-6 relative max-h-screen overflow-auto">
            <button @click="$emit('close')" class="absolute top-2 right-2 text-gray-500 hover:bg-red-500">
                ✖
            </button>
            <h2 class="text-2xl font-bold mb-6 text-center">Crear Nueva Categoria</h2>
            <form @submit.prevent = "submit" class="space-y-4">
                <div>
                    <label for="nombre" class="block text-gray-700">Nombre</label>
                    <input v-model="form.name" type="text" name="name" id="name" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
</style>