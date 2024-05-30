<template>
    <Head title="Reset Password" />

    <form @submit.prevent="submit">
        <InputGroup>
            <InputLabel for="email" value="Email" />

            <TextInput
                id="email"
                type="email"
                class="w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
            />

            <InputError :message="form.errors.email" />
        </InputGroup>

        <InputGroup class="mt-4">
            <InputLabel for="password" value="Password" />

            <TextInput
                id="password"
                type="password"
                class="w-full"
                v-model="form.password"
                required
                autocomplete="new-password"
            />

            <InputError :message="form.errors.password" />
        </InputGroup>

        <InputGroup class="mt-4">
            <InputLabel for="password_confirmation" value="Confirm Password" />

            <TextInput
                id="password_confirmation"
                type="password"
                class="w-full"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
            />

            <InputError :message="form.errors.password_confirmation" />
        </InputGroup>

        <div class="mt-4 flex items-center justify-end">
            <PrimaryButton :disabled="form.processing">
                Reset Password
            </PrimaryButton>
        </div>
    </form>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputGroup from "@/Components/InputGroup.vue";

defineOptions({
    layout: GuestLayout,
});

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>
