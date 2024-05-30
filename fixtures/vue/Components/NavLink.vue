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
        ? "border-y border-primary"
        : "border-y border-transparent hover:border-primary hover:text-primary",
);
</script>

<template>
    <Link :href="href" :class="classes" class="font-title uppercase font-bold py-2 text-sm transform scale-y-105 px-4 duration-300 transition-colors">
        <slot />
    </Link>
</template>
