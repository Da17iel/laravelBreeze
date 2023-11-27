<script setup>
import CustomTemplate from "@/Layouts/CustomTemplate.vue";


defineProps({
    user: Array,
    userCreatedAgo: String
})

defineOptions({
    layout: CustomTemplate
})
</script>

<template>
    <Head>
        <title>Edit User: {{ user.username }}</title>
    </Head>
    <h1>Editing the user: {{ user.name }}</h1>

    <p>User was created {{ userCreatedAgo }} ago</p>
</template>

<style scoped>

</style>
