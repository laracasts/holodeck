<script setup>
const model = defineModel("checked");

const props = defineProps({
    value: {
        default: null,
    },
});
</script>

<template>
    <input
        v-model="model"
        type="checkbox"
        :value="value"
        class="border-0 bg-gray-700 ring-1 ring-gray-500 duration-300 checked:border-gray-500 checked:bg-gray-700 hover:bg-gray-500 hover:checked:bg-gray-500 focus:bg-gray-700 focus:outline-0 focus:ring-1 focus:ring-alternate focus:ring-offset-0 focus:checked:bg-gray-500"
    />
</template>
