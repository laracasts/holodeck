<template>
    <div>
        <div class="mt-16">
            <Section heading="Brand">
                <Logo class="mx-auto mb-6 block"></Logo>
                <p class="text-pretty text-center text-secondary">
                    A virtual place for demo assets. Uplink, detach, have
                    fun.<br />
                    Welcome to the Holodeck.
                </p>
            </Section>
            <Colors />
            <Type />
            <Inputs />

            <Section heading="Pagination">
                <Subheading level="3" class="mb-4">Standard</Subheading>
                <Pagination
                    :paginator="pagination"
                    preserve-scroll
                    class="mb-8"
                />

                <Subheading level="3" class="mb-4">Simple</Subheading>
                <SimplePagination
                    :paginator="simplePagination"
                    preserve-scroll
                />
            </Section>

            <Cards />

            <Section heading="Design Utilities">
                <Subheading level="3" class="mb-4">Image Replicator</Subheading>
                <ImageReplicator
                    identifier="sample-image-replicator"
                    placeholder="If all you get is a kitten, you need to add a HOLODECK_OPEN_AI_SECRET to your .env file!"
                />
            </Section>
        </div>
    </div>
</template>

<script setup>
import Section from "@/Components/Section.vue";
import Logo from "@/Components/Logo.vue";
import Colors from "@/Components/Holodeck/Colors.vue";
import Type from "@/Components/Holodeck/Type.vue";
import Inputs from "@/Components/Holodeck/Inputs.vue";
import Pagination from "@/Components/Pagination.vue";
import Subheading from "@/Components/Subheading.vue";
import SimplePagination from "@/Components/SimplePagination.vue";
import Heading from "@/Components/Heading.vue";
import Card from "@/Components/Card.vue";
import Tag from "@/Components/Tag.vue";
import ActionCard from "@/Components/ActionCard.vue";
import StandardLayout from "@/Layouts/StandardLayout.vue";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import Anchor from "@/Components/Anchor.vue";
import Notification from "@/Components/Notification.vue";
import { ref, watch, watchEffect } from "vue";
import Cards from "@/Components/Holodeck/Cards.vue";
import ImageReplicator from "@/Components/Holodeck/ImageReplicator.vue";

defineOptions({
    layout: StandardLayout,
});

defineProps({
    pagination: {
        type: Object,
    },
    simplePagination: {
        type: Object,
    },
});
</script>
