<script setup>
import Pagination from "@/Shared/Pagination.vue";
import CustomTemplate from "@/Layouts/CustomTemplate.vue";
import { ref, watch } from "vue";
import {router} from '@inertiajs/vue3'; // Very important. Here to get the
import debounce from "lodash/debounce"; // debounce/throttle are ways to throttle the application so it doesn't send too many packets

let props = defineProps({
    users: Object,
    filters: Object
});

defineOptions({
    layout: CustomTemplate,
})

let search = ref(props.filters.search);

// Method to watch the search query
watch(search, debounce(function (value) {
    console.log("triggered");

    // Like the Link component just in code.
    router.get('/users', { search: value }, {
        preserveState: true, // Prevent the page from reloading
        replace: true
    });
}, 250)); // method above should at most be executed all 500ms. Help: lodash/debounce

</script>


<template>
    <Head title="Users" />


    <div class="flex justify-between mb-5">
        <h1 class="text-2xl font-bold">Users: </h1>
        <input v-model="search" type="text" placeholder="Search..." class="border-1 border-gray-300 rounded">
    </div>


    <!-- imported Table from https://flowbite.com/docs/components/tables/ -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users.data" :key="user.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ user.name }}
                </th>
                <td class="px-6 py-4">
                    {{ user.email }}
                </td>
                <td class="px-6 py-4">
                    <Link :href="'/user/' + user.username + '/edit'" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="flex justify-between">
        <!-- Paginator -->
        <!-- With this pagination we can only show 10 items in one page -->
        <!-- We do this with the help of the 'Component' Component of vuejs -->
        <Pagination class="mt-8" :links="users.links" />

        <Link href="/users/create" class="mt-6 p-3 border border-gray-300 rounded shadow-inner hover:border-gray-950">Create User</Link>
    </div>


</template>

<style scoped>

</style>
