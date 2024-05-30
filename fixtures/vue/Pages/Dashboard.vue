<template>
    <Head title="Dashboard" />

    <div class="py-16">
        <Container class="grid place-items-center">
            <div>
                <p class="font-title text-4xl font-bold">
                    "Things are only impossible until they're not."
                </p>
                <span class="text-sm italic text-secondary"
                    >Captain Jean-Luc Picard</span
                >
            </div>
        </Container>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import StandardLayout from "@/Layouts/StandardLayout.vue";
import Container from "@/Components/Container.vue";

defineOptions({
    layout: StandardLayout,
});
</script>
