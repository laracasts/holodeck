<template>
    <div class="overflow-x-auto">
        <nav
            class="isolate inline-flex space-x-2 rounded-md shadow-sm"
            aria-label="Pagination"
        >
            <component
                v-for="link in links"
                :is="link.url ? Link : 'button'"
                :key="link.url"
                :href="link.url"
                :disabled="!link.url"
                :aria-current="link.active ? 'page' : null"
                class="px-5 py-3 text-alternate transition-colors duration-300 hover:bg-primary-highlight focus:outline-0 focus:ring-1 focus:ring-alternate"
                :class="{
                    'bg-primary': link.active,
                    'bg-gray-800': !link.active,
                }"
                :preserve-scroll="preserveScroll"
            >
                {{ link.label }}
            </component>
        </nav>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    paginator: {
        type: Object,
    },
    preserveScroll: {
        type: Boolean,
        default: false,
    },
});

const links = computed(() => props.paginator.links.slice(1, -1));
</script>
