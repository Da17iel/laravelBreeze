<script setup>
import {router, useForm} from '@inertiajs/vue3';
import CustomTemplate from "@/Layouts/CustomTemplate.vue";

defineOptions({
    layout: CustomTemplate,
})

// useForm is a method of inertia/vue3. It gives forms on steroids
let form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
});

// Function to handle the submit button
let submit = () => {
    form.post('/users');
}
</script>


<template>
    <Head title="Create new User" />

    <div class="w-1/2 mx-auto">
        <h1 class="mb-10 text-2xl font-bold">Create a new User</h1>

        <!-- Display the errors. form.errors is also given by useForm method from vue3 -->
        <p v-for="error in form.errors" :key="error" class="text-red-600 text-bold mb-2">{{ error }}</p>

        <!-- override the submit method given by HTML -->
        <form @submit.prevent="submit">

            <div class="mb-5">
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name"
                       v-model="form.name"
                       class="border border-gray-400 shadow-inner rounded w-full
                            hover:border-gray-950">
            </div>

            <div class="mb-5">
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username"
                       v-model="form.username"
                       class="border border-gray-400 shadow-inner rounded w-full
                            hover:border-gray-950">
            </div>

            <div class="mb-5">
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email"
                       v-model="form.email"
                       class="border border-gray-400 shadow-inner rounded w-full
                            hover:border-gray-950">
            </div>

            <div class="mb-5">
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password"
                       v-model="form.password"
                       class="border border-gray-400 shadow-inner rounded w-full
                            hover:border-gray-950">
            </div>

            <div class="mb-12">
                <label for="password_confirmation">Confirm password:</label><br>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       v-model="form.password_confirmation"
                       class="border border-gray-400 shadow-inner rounded w-full
                            hover:border-gray-950">
            </div>

            <div class="mb-5">
                <input
                    type="submit"
                    name="submit"
                    id="submit"
                    class="border border-gray-400 shadow-inner rounded w-full h-10
                           hover:border-gray-600 hover:shadow"
                    :disabled="form.processing"> <!-- using method given by useForm -->
            </div>
        </form>
    </div>


</template>

<style scoped>

</style>
