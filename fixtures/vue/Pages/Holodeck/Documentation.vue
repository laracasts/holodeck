<template>
    <Section :heading="heading" class="my-12">
        <div v-html="content" class="prose prose-invert max-w-none"></div>
    </Section>
</template>

<script setup>
import "../../../../vendor/tempest/highlight/src/Themes/Css/dark-plus.css";
import StandardLayout from "@/Layouts/StandardLayout.vue";
import Section from "@/Components/Section.vue";

defineProps({
    heading: {
        type: String,
        required: true,
    },
    content: {
        type: String,
        required: true,
    },
});

defineOptions({
    layout: StandardLayout,
});
</script>
