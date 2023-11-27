<script setup>
import {router, useForm} from '@inertiajs/vue3';

// useForm is a method of inertia/vue3. It gives forms on steroids
let form = useForm({
    username: '',
    password: '',
});

// Function to handle the submit button
let submit = () => {
    form.post('/login');
}
</script>


<template>
    <Head title="Login" />

    <main class="grid place-items-center min-h-screen">



        <section class="w-1/3 p-8 border border-gray-300 rounded-2xl">
            <h1 class="text-2xl font-bold mb-8">Login</h1>

            <!-- Display the errors. form.errors is also given by useForm method from vue3 -->
            <p v-for="error in form.errors" :key="error" class="text-red-600 text-bold mb-2">{{ error }}</p>

            <!-- override the submit method given by HTML -->
            <form @submit.prevent="submit">

                <div class="mb-5">
                    <label for="username">Username:</label><br>
                    <input type="text" name="username" id="username"
                           v-model="form.username"
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
        </section>
    </main>


</template>

<style scoped>

</style>
