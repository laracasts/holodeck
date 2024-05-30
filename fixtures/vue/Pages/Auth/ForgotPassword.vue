<template>
    <Head title="Forgot Password" />

    <div class="mb-4 text-secondary text-sm">
        Forgot your password? No problem. Just let us know your email address
        and we will email you a password reset link that will allow you to
        choose a new one.
    </div>

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>

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

        <div class="mt-4 flex items-center justify-end">
            <PrimaryButton :disabled="form.processing">
                Email Password Reset Link
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

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>
