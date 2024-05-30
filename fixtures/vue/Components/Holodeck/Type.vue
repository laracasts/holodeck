<template>
    <Section heading="Type">
        <div class="text-3xl">
            <Subheading level="3" class="mb-6">HK Grotesk</Subheading>
            <ul>
                <TypeExample
                    v-for="size in bodyTextSizes"
                    :size="size"
                    :copy-content="`text-${size}`"
                />
            </ul>

            <Subheading level="3" class="mb-6 mt-12">Kanit (titles)</Subheading>
            <ul>
                <TypeExample
                    v-for="size in titleTextSizes"
                    :size="size"
                    :copy-content="`text-${size} font-title font-extrabold uppercase`"
                    class="font-title font-extrabold uppercase"
                />
            </ul>
        </div>
    </Section>
</template>
<script setup>
import Section from "@/Components/Section.vue";
import Subheading from "@/Components/Subheading.vue";
import TypeExample from "@/Components/Holodeck/TypeExample.vue";

const bodyTextSizes = ["3xl", "2xl", "xl", "lg", "md", "sm", "xs", "2xs"];
const titleTextSizes = ["4xl"];
</script>
