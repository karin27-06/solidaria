<script setup lang="ts">
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        default: false,
    },
});

// Clases dinámicas para el enlace activo
const classes = computed(() => {
    return props.active
        ? "flex items-center p-2 rounded-lg text-sky-700 bg-blue-100 text-blue-700 transition-colors duration-200"
        : "flex items-center p-2 rounded-lg text-sky-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200";
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
