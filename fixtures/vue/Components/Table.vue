<template>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead
                v-if="headings || $slots.head"
                class="border-b border-white/10 font-title font-semibold uppercase"
            >
                <slot name="head">
                    <TableRow>
                        <th v-for="column in headings">{{ column }}</th>
                    </TableRow>
                </slot>
            </thead>
            <tbody class="divide-y divide-white/10 even:*:bg-black/5">
                <slot></slot>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import TableRow from "@/Components/TableRow.vue";

defineProps({
    headings: {
        type: Array,
        required: false,
    },
});
</script>
