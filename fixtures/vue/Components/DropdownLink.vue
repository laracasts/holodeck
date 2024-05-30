<template>
    <Link
        :href
        class="block w-full px-4 py-2 text-start text-sm leading-5 transition duration-150 ease-in-out hover:bg-primary-highlight focus:bg-primary-highlight focus:outline-none"
    >
        <slot />
    </Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>
