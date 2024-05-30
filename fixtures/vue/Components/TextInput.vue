<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="border-0 bg-gray-700 px-5 py-3 font-semibold outline-0 ring-1 ring-gray-500 duration-300 focus:border-0 focus:outline-0 focus:ring-alternate"
        v-model="model"
        ref="input"
    />
</template>
