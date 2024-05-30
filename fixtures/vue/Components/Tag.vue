<template>
    <component
        :is="href ? Link : 'span'"
        class="bg-gray-600 px-3 py-1 text-sm font-semibold"
        :class="{
            'hover:bg-primary-highlight duration-300': href
        }"
    >
        <slot></slot>
    </component>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
        required: false,
    },
});
</script>
