<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Section from "@/Components/Section.vue";
import InputGroup from "@/Components/InputGroup.vue";
import InputDescription from "@/Components/InputDescription.vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <Section heading="Update Password">
        <form @submit.prevent="updatePassword" class="space-y-4">
            <InputGroup>
                <InputLabel for="current_password" value="Current Password" />

                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="w-full"
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.current_password" />
            </InputGroup>

            <InputGroup>
                <InputLabel for="password" value="New Password" />

                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="w-full"
                    autocomplete="new-password"
                />

                <InputDescription>
                    Ensure your account is using a long, random password to stay
                    secure.
                </InputDescription>

                <InputError :message="form.errors.password" />
            </InputGroup>

            <InputGroup>
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="w-full"
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password_confirmation" />
            </InputGroup>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <p
                    v-if="form.recentlySuccessful"
                    class="text-sm text-secondary"
                >
                    Saved.
                </p>
            </div>
        </form>
    </Section>
</template>
