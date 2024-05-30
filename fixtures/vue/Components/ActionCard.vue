<template>
    <Link :href class="block ring-1 ring-transparent duration-300 hover:ring-primary group/card">
        <Card v-bind="$attrs">
            <slot></slot>
        </Card>
    </Link>
</template>

<script setup>
import Card from "@/Components/Card.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
    }
});

defineOptions({
    inheritAttrs: false,
});
</script>
