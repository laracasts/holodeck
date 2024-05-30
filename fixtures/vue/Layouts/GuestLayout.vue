<template>
    <div
        class="min-h-screen flex flex-col items-center pt-6 sm:justify-center sm:pt-0 selection:bg-primary-lowlight"
    >
        <div class="px-4">
            <Link href="/">
                <Logo class="h-16 w-full fill-current text-gray-500" />
            </Link>
        </div>

        <Container class="mt-6 w-full max-w-md">
            <slot />
        </Container>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Logo from "@/Components/Logo.vue";
import Container from "@/Components/Container.vue";
</script>
