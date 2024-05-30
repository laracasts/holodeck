<template>
    <Head title="Register" />

    <form @submit.prevent="submit">
        <InputGroup>
            <InputLabel for="name" value="Name" />

            <TextInput
                id="name"
                type="text"
                class="w-full"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />

            <InputError :message="form.errors.name" />
        </InputGroup>

        <InputGroup class="mt-4">
            <InputLabel for="email" value="Email" />

            <TextInput
                id="email"
                type="email"
                class="w-full"
                v-model="form.email"
                required
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
            <Anchor :href="route('login')">Already registered?</Anchor>

            <PrimaryButton class="ms-4" :disabled="form.processing">
                Register
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
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputGroup from "@/Components/InputGroup.vue";
import Anchor from "@/Components/Anchor.vue";

defineOptions({
    layout: GuestLayout,
});

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>
