<template>
    <InputGroup>
        <div class="flex items-center space-x-2">
            <slot name="input" />
            <label
                class="flex items-baseline font-sans text-md font-semibold tracking-tight text-alternate"
                :for="$attrs.for"
            >
                {{ label }}
            </label>
        </div>
        <slot></slot>
    </InputGroup>
</template>

<script setup>
import InputGroup from "@/Components/InputGroup.vue";

defineProps({
    label: {
        type: String,
    },
});
</script>
