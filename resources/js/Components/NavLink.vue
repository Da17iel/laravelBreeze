<script setup>
import { computed } from 'vue';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'font-bold'
        : ''
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
