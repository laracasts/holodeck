<template>
    <component
        :is="`h${level}`"
        class="font-title text-4xl font-extrabold uppercase leading-tight"
    >
        <slot></slot>
    </component>
</template>

<script setup>
defineProps({
    level: {
        default: "2",
        validator: (value) => ["1", "2", "3", "4", "5", "6"].includes(value),
    },
});
</script>
