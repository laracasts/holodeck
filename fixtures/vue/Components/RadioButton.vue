<script setup>
const model = defineModel();

const props = defineProps({
    name: {
        type: String,
    },
});
</script>

<template>
    <input
        v-model="model"
        type="radio"
        :name="name"
        class="border-0 ring-1 ring-gray-500 duration-300 bg-gray-700 checked:border-gray-500 checked:bg-gray-700 hover:bg-gray-500 hover:checked:bg-gray-500 focus:checked:bg-gray-500 focus:bg-gray-700 focus:outline-0 focus:ring-1 focus:ring-alternate focus:ring-offset-0"
    />
</template>
