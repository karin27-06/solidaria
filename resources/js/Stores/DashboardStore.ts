import { defineStore } from "pinia";

export const useThemeStore = defineStore("theme", {
    state: () => ({
        isDarkMode: false,
    }),
    actions: {
        toggleDarkMode() {
            this.isDarkMode = !this.isDarkMode;
            document.documentElement.classList.toggle(
                "my-app-dark",
                this.isDarkMode
            );
        },
    },
});

export const useAsideStore = defineStore("aside", {
    state: () => ({
        isAsideVisible: true,
    }),
    actions: {
        toggleAside() {
            this.isAsideVisible = !this.isAsideVisible;
        },
    },
});
