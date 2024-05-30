<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

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
        ? "border-primary"
        : "border-transparent hover:border-primary hover:text-primary",
);
</script>

<template>
    <Link
        :href="href"
        :class="classes"
        class="border-l-4 pl-6 text-left font-title text-4xl font-bold uppercase leading-tight tracking-wide duration-300 focus:outline-0 focus:ring-1 focus:ring-alternate"
    >
        <slot />
    </Link>
</template>
