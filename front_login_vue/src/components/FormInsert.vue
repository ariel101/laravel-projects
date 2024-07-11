<script setup>
</script>

<template>
    <div>
        <h1>Insertar Mascotas</h1>
        <form action="">
            <div>
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div>
                <label for="Genero">Genero</label>
                <select name="genero" id="genero">
                    <option value="M">M</option>
                    <option value="E">E</option>
                </select>
            </div>
            <div>
                <label for="raza">Raza</label>
                <input type="text" name="raza" id="raza">
            </div>
            <div>
                <label for="edad">Edad</label>
                <input type="number" name="edad" id="edad">
            </div>
            <div>
                <label for="propietario">Propietario</label>
                <select name="propietario" id="propietario">
                    <option value=""></option>
                </select>
            </div>
        </form>
    </div>
</template>

<style scoped>
</style>