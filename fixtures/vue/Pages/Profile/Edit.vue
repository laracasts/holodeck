<template>
    <Head title="Profile" />

    <div class="py-12">
        <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
        />

        <UpdatePasswordForm />

        <DeleteUserForm />
    </div>
</template>

<script setup>
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import StandardLayout from "@/Layouts/StandardLayout.vue";

defineOptions({
    layout: StandardLayout,
});

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>
