<template>
    <div>
        <nav
            class="isolate inline-flex space-x-2 rounded-md shadow-sm"
            aria-label="Pagination"
        >
            <Link
                :href="paginator.first_page_url"
                class="flex items-center px-5 py-3 text-alternate transition-colors duration-300 focus:border-none focus:outline-0 focus:ring-2 focus:ring-alternate"
                :class="{
                    'bg-gray-800 hover:bg-primary-highlight':
                        paginator.current_page !== 1,
                }"
                title="First page"
                :preserve-scroll="preserveScroll"
            >
                <ChevronDoubleLeftIcon class="size-4" />
            </Link>
            <Link
                :href="paginator.prev_page_url"
                class="flex items-center px-5 py-3 text-alternate transition-colors duration-300 focus:border-none focus:outline-0 focus:ring-2 focus:ring-alternate"
                :class="{
                    'bg-gray-800 hover:bg-primary-highlight':
                        paginator.prev_page_url,
                }"
                title="Previous page"
                :preserve-scroll="preserveScroll"
            >
                <ChevronLeftIcon title="Previous" class="size-4" />
            </Link>
            <span
                class="bg-primary px-5 py-3 text-alternate transition-colors duration-300 focus:outline-0 focus:ring-1 focus:ring-alternate"
            >
                {{ paginator.current_page }}
            </span>
            <Link
                :href="paginator.next_page_url"
                class="flex items-center px-5 py-3 text-alternate transition-colors duration-300 focus:border-none focus:outline-0 focus:ring-2 focus:ring-alternate"
                :class="{
                    'bg-gray-800 hover:bg-primary-highlight':
                        paginator.next_page_url,
                }"
                title="Next page"
                :preserve-scroll="preserveScroll"
            >
                <ChevronRightIcon title="Previous" class="size-4" />
            </Link>
        </nav>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import {
    ChevronDoubleLeftIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
} from "@heroicons/vue/16/solid/index.js";

const props = defineProps({
    paginator: {
        type: Object,
    },
    preserveScroll: {
        type: Boolean,
        default: false,
    },
});
</script>
