<template>
    <Head title="Log in" />

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

        <InputGroup class="mt-4">
            <InputLabel for="password" value="Password" />

            <TextInput
                id="password"
                type="password"
                class="w-full"
                v-model="form.password"
                required
                autocomplete="current-password"
            />

            <InputError :message="form.errors.password" />
        </InputGroup>

        <InlineInputGroup label="Remember me" for="remember" class="mt-4">
            <template #input>
                <Checkbox
                    id="remember"
                    name="remember"
                    v-model:checked="form.remember"
                />
            </template>

            <InputError :message="form.errors.remember" />
        </InlineInputGroup>

        <div class="mt-4 flex items-center justify-end">
            <Anchor v-if="canResetPassword" :href="route('password.request')"
                >Forgot your password?
            </Anchor>

            <PrimaryButton class="ms-4" :disabled="form.processing">
                Log in
            </PrimaryButton>
        </div>
    </form>
</template>

<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputGroup from "@/Components/InputGroup.vue";
import InlineInputGroup from "@/Components/InlineInputGroup.vue";
import Anchor from "@/Components/Anchor.vue";

defineOptions({
    layout: GuestLayout,
});

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>
