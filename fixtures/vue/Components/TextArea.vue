<script setup>
import { onMounted, ref } from "vue";

defineProps({
    rows: {
        type: Number,
        default: 5,
    },
});

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
    <textarea
        class="border-0 bg-gray-700 px-5 py-3 outline-0 ring-1 ring-gray-500 duration-300 focus:border-0 focus:outline-0 focus:ring-1 focus:ring-alternate"
        v-model="model"
        ref="input"
        :rows="rows"
    />
</template>
