<template>
    <component
        :is="is"
        class="flex items-center justify-center border border-transparent px-10 py-3 font-title font-bold uppercase ring-1 ring-primary transition-colors duration-300 hover:ring-primary-highlight focus:outline-0 focus:ring-1 focus:ring-alternate disabled:ring-gray-500"
    >
        <slot />
    </component>
</template>

<script setup>
defineProps({
    is: {
        default: "button",
    },
});
</script>
