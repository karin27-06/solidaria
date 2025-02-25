<script setup>
import AsideDashboard from "@/Components/Dashboard/AsideDashboard.vue";
import HeaderDashboard from "@/Components/Dashboard/HeaderDashboard.vue";
import { Head } from "@inertiajs/vue3";
import { Toast } from "primevue";

defineProps({
    title: String,
});
</script>

<template>
    <Head :title="title" />
    <!-- crear una clase para asignar los colores para el fondo oscuro y claro -->
    <div class="flex flex-col min-h-screen">
        <HeaderDashboard />
        <div class="flex flex-1">
            <AsideDashboard />
            <main class="flex-1 p-2">
                <Toast position="bottom-right" group="br" />
                <slot />
            </main>
        </div>
        <!-- <Footer /> -->
    </div>
</template>
