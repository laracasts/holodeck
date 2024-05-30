<template>
    <component
        :is="isNative ? 'a' : Link"
        :href
        class="font-semibold text-primary transition-colors duration-300 hover:text-primary-highlight focus:outline-0 focus:ring-1 focus:ring-alternate"
    >
        <slot></slot>
    </component>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    isNative: {
        type: Boolean,
        required: false,
    },
});

const isNative = computed(
    () => props.isNative || !props.href.includes(window.location.host),
);
</script>
