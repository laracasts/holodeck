<template>
    <Section heading="Inputs + Buttons">
        <Heading class="mb-6">Inputs</Heading>

        <form action="" class="mb-12 space-y-4">
            <InputGroup>
                <InputLabel>Title of Input</InputLabel>
                <div class="flex space-x-4">
                    <TextInput :model-value="form.textInput" class="w-full" />
                    <PrimaryButton>Uplink</PrimaryButton>
                </div>
            </InputGroup>

            <InputGroup>
                <InputLabel>Input + Description below</InputLabel>
                <TextInput
                    :model-value="form.textDescriptionInput"
                    class="w-full"
                />
                <InputDescription
                    >Enter the name of your first pet.
                </InputDescription>
            </InputGroup>

            <InputGroup>
                <InputLabel>Input + Description below</InputLabel>
                <TextInput :model-value="form.textErrorInput" class="w-full" />
                <InputError
                    message="Description is too short, please use at least 150 characters."
                ></InputError>
            </InputGroup>

            <InputGroup>
                <InputLabel optional>Comment Field</InputLabel>
                <TextArea
                    :model-value="form.textAreaInput"
                    class="w-full max-w-2xl"
                ></TextArea>
            </InputGroup>

            <div>
                <Subheading level="3" class="mb-4"
                    >Checkboxes and Radio Buttons
                </Subheading>
                <div class="grid max-w-xl gap-12 md:grid-cols-2">
                    <div class="space-y-3">
                        <InlineInputGroup
                            v-for="(checkbox, key) in form.checkboxes"
                            label="Checkbox Element Text"
                            :for="`checkbox-${key}`"
                        >
                            <template #input>
                                <Checkbox
                                    v-model:checked="form.checkboxes[key]"
                                    :id="`checkbox-${key}`"
                                />
                            </template>
                        </InlineInputGroup>
                    </div>
                    <div class="space-y-3">
                        <InlineInputGroup
                            v-for="number in 4"
                            label="Radio Button Element Text"
                            :for="`radioButton-${number}`"
                        >
                            <template #input>
                                <RadioButton
                                    v-model="form.radioButton"
                                    name="radio"
                                    :value="number"
                                    :id="`radioButton-${number}`"
                                />
                            </template>
                        </InlineInputGroup>
                    </div>
                </div>
            </div>
        </form>

        <Heading class="mb-6">Buttons</Heading>

        <div class="mb-12 flex flex-wrap gap-8">
            <div>
                <Subheading level="3" class="mb-4">Primary</Subheading>
                <PrimaryButton>Uplink</PrimaryButton>
            </div>
            <div>
                <Subheading level="3" class="mb-4">Disabled</Subheading>
                <PrimaryButton disabled>Uplink</PrimaryButton>
            </div>
            <div>
                <Subheading level="3" class="mb-4">Secondary</Subheading>
                <SecondaryButton>Uplink</SecondaryButton>
            </div>
            <div>
                <Subheading level="3" class="mb-4">Disabled</Subheading>
                <SecondaryButton disabled>Uplink</SecondaryButton>
            </div>
            <div>
                <Subheading level="3" class="mb-4">Danger</Subheading>
                <DangerButton>Reset Fields</DangerButton>
            </div>
            <div>
                <Subheading level="3" class="mb-4">Disabled</Subheading>
                <DangerButton disabled>Reset Fields</DangerButton>
            </div>
        </div>

        <Heading class="mb-6">Text Links</Heading>

        <p>
            Stay up to date with the Holodeck - powered by
            <Anchor href="https://laracasts.com">Laracasts</Anchor>
            Holotechnologies - and uplink your neural transmitters to our
            interface.
        </p>
    </Section>
</template>
<script setup>
import TextArea from "@/Components/TextArea.vue";
import InlineInputGroup from "@/Components/InlineInputGroup.vue";
import Heading from "@/Components/Heading.vue";
import Section from "@/Components/Section.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputDescription from "@/Components/InputDescription.vue";
import TextInput from "@/Components/TextInput.vue";
import InputGroup from "@/Components/InputGroup.vue";
import InputError from "@/Components/InputError.vue";
import Anchor from "@/Components/Anchor.vue";
import RadioButton from "@/Components/RadioButton.vue";
import Subheading from "@/Components/Subheading.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    textInput: "",
    textDescriptionInput: "Full Time",
    textErrorInput: "Description is too short produces error",
    textAreaInput:
        "Stay up to date with the Holodeck - powered by Laracasts Holotechnologies - and uplink your neural transmitters to our interface.",
    checkboxes: {
        0: false,
        1: true,
        2: true,
        3: false,
    },
    radioButton: 2,
});
</script>
