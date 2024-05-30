<template>
    <Section heading="Cards">
        <Heading class="mb-6">Cards</Heading>
        <Subheading level="3" class="mb-4"
        >Basic Card System
        </Subheading>

        <div class="mb-6 space-y-2 @container">
            <Card class="flex max-w-3xl flex-col gap-4 @md:flex-row">
                <img
                    src="@assets/card-image-1.png"
                    alt="A Sci-Fi botanist."
                    class="max-h-48 object-cover object-center @md:max-h-none"
                />

                <div class="flex flex-col">
                            <span class="my-2 block font-semibold text-gray-200"
                            >Holodeck Corp</span
                            >
                    <h3 class="mb-4 text-3xl font-semibold">
                        Virtual Flora and Fauna Bio-technician
                    </h3>

                    <p
                        class="mb-6 max-w-prose grow text-pretty font-light"
                    >
                        Join the vanguard of virtual reality creators;
                        we’re seeking innovative programmers to craft
                        worlds where imagination meets interactivity.
                    </p>

                    <div
                        class="mb-2 flex flex-col justify-between gap-3 @xl:flex-row"
                    >
                                <span class="font-semibold text-gray-200"
                                >Full Time - From 60k Credits</span
                                >

                        <ul class="flex flex-wrap gap-2">
                            <li>
                                <Tag href="#">Frontend</Tag>
                            </li>
                            <li>
                                <Tag href="#">Backend</Tag>
                            </li>
                            <li>
                                <Tag href="#">API</Tag>
                            </li>
                        </ul>
                    </div>
                </div>
            </Card>
            <div class="grid @2xl:grid-cols-3">
                <div class="@container">
                    <ActionCard href="#" class="flex flex-col gap-3">
                        <img
                            src="@assets/card-image-2.png"
                            alt="A bustling space hub."
                            class="w-full object-cover"
                        />

                        <div class="px-6 text-center">
                            <h3
                                class="mb-3 text-3xl font-semibold duration-300 group-hover/card:text-primary"
                            >
                                Holoscape Scripter
                            </h3>

                            <p class="text-pretty font-light">
                                Join the vanguard of virtual reality
                                creators; we’re seeking the future.
                            </p>

                            <span
                                class="mt-6 block text-sm text-gray-400"
                            >Full Time - From $200k Credits</span
                            >
                        </div>
                    </ActionCard>
                </div>
            </div>
        </div>

        <Subheading level="3" class="mb-4">Table</Subheading>

        <Card class="mb-6 px-4 py-4">
            <Table
                :headings="['Job', 'Credits', 'Reference', 'Sector']"
            >
                <TableRow
                    v-for="{
                                title,
                                credits,
                                reference,
                                sector,
                            } in tableData"
                >
                    <th class="whitespace-nowrap">{{ title }}</th>
                    <td class="text-secondary">{{ credits }}</td>
                    <td class="text-secondary">{{ reference }}</td>
                    <td class="text-secondary">
                        <Anchor :href="route('dashboard')"
                        >{{ sector }}
                        </Anchor>
                    </td>
                </TableRow>
            </Table>
        </Card>

        <Subheading level="3" class="mb-4">Notifications</Subheading>

        <div class="grid items-start md:grid-cols-2 gap-3">
            <Notification class="flex-1">
                <p>
                    This is the default notification. Nothing to do
                    here, it will close itself in a little while.
                </p>
            </Notification>
            <Notification v-model="showNotification" closeable class="flex-1">
                <p>
                    This is the closeable notification. Go ahead, give
                    it a try!
                </p>
            </Notification>
        </div>
    </Section>
</template>
<script setup lang="ts">
import Subheading from "@/Components/Subheading.vue";
import Card from "@/Components/Card.vue";
import ActionCard from "@/Components/ActionCard.vue";
import Table from "@/Components/Table.vue";
import Anchor from "@/Components/Anchor.vue";
import Section from "@/Components/Section.vue";
import Notification from "@/Components/Notification.vue";
import Heading from "@/Components/Heading.vue";
import TableRow from "@/Components/TableRow.vue";
import Tag from "@/Components/Tag.vue";
import {ref, watch} from "vue";

const tableData = [
    {
        title: "Holodev",
        credits: "50k",
        reference: "NF KTH-7",
        sector: 2,
    },
    {
        title: "Ethical Biohacker",
        credits: "75k",
        reference: "NF BIO-7",
        sector: 5,
    },
    {
        title: "Crypto Dataminer",
        credits: "38k",
        reference: "TH NTS-12",
        sector: 5,
    },
    {
        title: "Hoverbike Mechanic",
        credits: "29k",
        reference: "SP TJB-4",
        sector: 5,
    },
    {
        title: "Synapse Data Mapper",
        credits: "112k",
        reference: "SY BYS-57",
        sector: 5,
    },
];

const showNotification = ref(true);

watch(showNotification, async (value) => {
    if (value) {
        return;
    }

    setTimeout(() => showNotification.value = true, 2000);
});
</script>
