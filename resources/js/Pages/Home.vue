<script setup>
import CustomTemplate from "@/Layouts/CustomTemplate.vue";

// This is using the COMPOSITION API
defineProps({
        name: String,
        age: Number,
        gender: String,
        favoriteDishes: Array,
        time: String,
    })

// By Setting the Custom Template as the layout.
// The Layout will no longer be destroyed while switching pages.
// Home is now a child of CustomTemplate
defineOptions({
    layout: CustomTemplate,
})
</script>

<template>
    <Head>
        <!-- In here you can set the page head Tag -->
        <title>Homepage</title>
        <!-- Tries to override the desc. in the layout File. Works with key.  -->
        <meta name="description" content="Homepage of the Testing Website" head-key="description">
    </Head>
    <h1 class="text-2xl font-semibold mb-5">Hello everybody this is me!</h1>
    <p>Some information about me:</p>
    <p>My Name is: {{ name }}</p>
    <p>I am {{ age }} years old</p>
    <p>I identify as a {{ gender }}</p>
    <br>
    <p>This is the current time: {{ time }}</p>

    <p>Those are my favorite dishes:</p>
    <ul id="favDishes">
        <li v-for="favDish in favoriteDishes" :key="favDish" class="list-disc ml-10">{{ favDish }}</li>
    </ul>
</template>

<style scoped>

</style>
