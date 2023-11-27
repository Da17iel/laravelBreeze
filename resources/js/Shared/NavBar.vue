<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<script>

</script>

<template>
    <ul class="flex flex-row space-x-4">
        <li>
            <NavLink href="/home" :active="$page.component == 'Home'">Home</NavLink>
        </li>
        <li>
            <NavLink href="/settings" :active="$page.component == 'Settings'">Settings</NavLink>
        </li>
        <li>
            <NavLink href="/profile" :active="$page.component == 'Profile'">Profile</NavLink>
        </li>
        <li>
            <NavLink href="/users" :active="$page.component == 'Users'">Users</NavLink>
        </li>
        <li>
            <NavLink href="/logout" method="post" as="button">Log out</NavLink>
        </li>
    </ul>
</template>

<style scoped>

</style>
