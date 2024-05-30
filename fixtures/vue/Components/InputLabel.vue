<script setup>
defineProps({
    value: {
        type: String,
    },
    optional: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <label
        class="flex items-baseline font-sans text-lg font-semibold tracking-tight text-alternate"
    >
        <span class="mr-3 block size-2 bg-alternate" aria-hidden="true"></span>
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>

        <span v-if="optional" class="ml-2 inline-block text-primary"
            >(Optional)</span
        >
    </label>
</template>
