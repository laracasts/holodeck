<template>
    <component
        :is="`h${level}`"
        class="flex items-baseline font-sans text-lg font-semibold tracking-tight text-alternate"
    >
        <span class="mr-3 block size-3 bg-alternate" aria-hidden="true"></span>
        <slot></slot>
    </component>
</template>
<script setup>
defineProps({
    level: {
        default: "2",
        validator: (value) => ["2", "3", "4", "5", "6"].includes(value),
    },
});
</script>
