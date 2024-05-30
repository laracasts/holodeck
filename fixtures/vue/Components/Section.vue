<template>
    <section
        class="mb-32 grid auto-rows-max grid-cols-10 gap-4 px-4 lg:px-8"
        :aria-labelledby="subheadingId"
    >
        <Subheading :id="subheadingId" class="col-span-10 md:col-span-2">{{
            heading
        }}</Subheading>

        <div class="col-span-10 md:col-span-6">
            <slot></slot>
        </div>
    </section>
</template>

<script setup>
import { useUniqueId } from "@/Composables/useUniqueId.js";
import Subheading from "@/Components/Subheading.vue";

defineProps({
    heading: {
        type: String,
    },
});

const subheadingId = useUniqueId().generateUniqueId("section-heading");
</script>
