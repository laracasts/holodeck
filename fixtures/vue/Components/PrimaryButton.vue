<template>
    <component
        :is="is"
        class="flex items-center justify-center border border-transparent bg-primary px-10 py-3 font-title font-bold uppercase transition-colors duration-300 hover:bg-primary-highlight focus:outline-0 focus:ring-1 focus:ring-alternate disabled:bg-gray-500"
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
