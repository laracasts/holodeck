<template>
    <div class="flex flex-col items-center space-y-4">
        <button
            @click="writeToClipboard(copyContent)"
            class="ring-1 ring-gray-500 transition-all duration-300 hover:ring-1 hover:ring-alternate focus:outline-0 focus:ring-1 focus:ring-alternate"
        >
            <span
                class="block h-10 w-20"
                :style="{ 'background-color': color }"
                aria-hidden="true"
            ></span>
        </button>
        <span class="text-sm text-secondary">{{ color }}</span>
    </div>
</template>
<script setup>
import { useCopy } from "@/Composables/useCopy.js";

defineProps({
    color: {
        type: String,
    },
    copyContent: {
        type: String,
    },
});

const { writeToClipboard } = useCopy();
</script>
