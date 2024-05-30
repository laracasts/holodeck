<template>
    <Transition>
        <figure
            v-show="model"
            class="relative max-w-xs bg-gray-600 py-4 pl-4 pr-6 transition-transform duration-[20ms]"
        >
            <button
                @click="model = false"
                type="button"
                v-if="closeable"
                class="absolute right-0 top-0 grid size-5 place-items-center bg-primary transition-colors duration-300 hover:bg-primary-highlight"
            >
                <XMarkIcon class="size-3" />
            </button>
            <span
                v-else
                class="absolute right-0 top-0 size-3 bg-primary"
            ></span>
            <slot></slot>
        </figure>
    </Transition>
</template>

<script setup>
import { XMarkIcon } from "@heroicons/vue/16/solid/index.js";

defineProps({
    closeable: {
        type: Boolean,
        default: false,
    },
});

const model = defineModel({
    type: Boolean,
    default: true,
});
</script>

<style scoped>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
    transition: opacity 0.3s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
