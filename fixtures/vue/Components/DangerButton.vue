<template>
    <component
        :is="is"
        class="flex items-center justify-center border border-transparent ring-1 ring-error px-6 py-3 font-title font-bold uppercase text-error transition-colors duration-300 hover:line-through focus:outline-0 focus:ring-1 focus:ring-alternate disabled:ring-gray-500 disabled:text-gray-500 disabled:hover:no-underline"
    >
        &nbsp;
        <slot />
        &nbsp;
    </component>
</template>

<script setup>
defineProps({
    is: {
        default: "button",
    },
});
</script>
