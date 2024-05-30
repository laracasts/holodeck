<template>
  <li
      class="group relative flex flex-col gap-2 py-2 transition-colors duration-300 md:flex-row md:items-center md:gap-6 md:px-4 md:hover:bg-gray-700"
  >
    <p :class="`grow text-${size}`">
      The quick brown fox jumps over the lazy dog
    </p>
    <div class="shrink-0 space-x-6">
            <span class="inline-block font-semibold text-secondary">{{
                size
              }}</span>
      <span class="inline-block font-semibold">{{
          theme.fontSize[size]
        }}</span>
    </div>
    <div
        v-if="copyContent"
        class="absolute inset-y-0 left-full flex items-stretch pl-2"
    >
      <button
          @click="writeToClipboard(copyContent)"
          class="px-4 font-sans text-md font-normal opacity-0 transition-colors duration-300 focus:border-0 focus:bg-primary-highlight focus:opacity-100 focus:outline-0 focus:ring-1 focus:ring-alternate group-hover:bg-gray-700 group-hover:hover:bg-primary-highlight md:group-hover:opacity-100"
          title="Copy classes to clipboard"
      >
        Copy
      </button>
    </div>
  </li>
</template>
<script setup>
import {useCopy} from "@/Composables/useCopy.js";
import resolveConfig from "tailwindcss/resolveConfig.js";
import tailwindConfig from "@/../../tailwind.config.js";

const theme = resolveConfig(tailwindConfig).theme;

defineProps({
  size: {
    type: String,
  },
  copyContent: {
    required: false,
  },
});

const {writeToClipboard} = useCopy();
</script>
