<template>
    <Menubar
        :model="items"
        class="p-0 my-1 bg-primary-500 rounded-lg shadow-md"
    >
        <template #start>
            <div class="flex items-center p-0">
                <Button
                    icon="pi pi-bars"
                    aria-label="menu"
                    class="p-button-rounded p-button-text text-white hover:bg-primary-600"
                    @click="AsideStore.toggleAside"
                >
                </Button>
                <h1 class="text-sm font-bold mt-5 mb-5 ml-1">
                    Bienvenido {{ $page.props.auth.user.name }}!
                </h1>
            </div>
        </template>
        <template #end>
            <div class="flex items-center px-2 gap-2">
                <Button
                    :icon="ThemeStore.isDarkMode ? 'pi pi-moon' : 'pi pi-sun'"
                    severity="secondary"
                    rounded
                    @click="ThemeStore.toggleDarkMode"
                >
                </Button>
                <Button
                    icon="pi pi-expand"
                    rounded
                    variant="outlined"
                    aria-label="pantalla completa"
                    @click="screen"
                />
                <Button
                    icon="pi pi-sign-out"
                    rounded
                    variant="outlined"
                    aria-label="salir"
                    @click="visible = true"
                />
            </div>
        </template>
    </Menubar>

    <Dialog
        v-model:visible="visible"
        header="Cerrar sesión"
        :style="{ width: '25rem' }"
        modal
        position="top"
    >
        <span class="text-primary-700 dark:text-primary-300 block mb-8">
            ¿Desea cerrar sesión?
        </span>
        <div class="flex justify-end gap-2">
            <Button
                type="button"
                label="Cancelar"
                severity="secondary"
                @click="visible = false"
            ></Button>
            <Button
                type="button"
                label="Cerrar"
                class="bg-red-500 text-white hover:bg-red-600"
                @click="logout"
            ></Button>
        </div>
    </Dialog>
</template>

<script setup>
import { Button, Dialog, Menubar } from "primevue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { useAsideStore, useThemeStore } from "@/Stores/DashboardStore";
const ThemeStore = useThemeStore();
const AsideStore = useAsideStore();
const visible = ref(false);
const items = ref([]);

const logout = () => {
    visible.value = false;
    router.post(
        route("logout"),
        {},
        {
            onFinish: () => {
                router.visit("/");
            },
        }
    );
};

const screen = () => {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else if (document.exitFullscreen) {
        document.exitFullscreen();
    }
};
</script>

<style scoped></style>
