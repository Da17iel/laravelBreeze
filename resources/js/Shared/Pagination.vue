<!--
This Page is all about Pagination
The Process of only showing 10 or so item in one page
this is very useful because we dont want to overwhelm the user with our Data.
This file accepts an Array as a datatype. This Array should contain an url, active and label property
-->

<script setup>
defineProps({
    links: Array,
})
</script>


<template>
    <div class="flex space-x-1">
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            :class="{ 'text-gray-500' : ! link.active, 'font-bold underline underline-offset-4' : link.active }"
        />
    </div>
</template>

<style scoped>

</style>
