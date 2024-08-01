<x-base-layout>
    <div
            class="min-h-screen flex flex-col items-center pt-6 sm:justify-center sm:pt-0 selection:bg-primary-lowlight"
    >
        <div class="px-4">
            <a href="/">
                <x-logo class="h-16 w-full fill-current text-gray-500"/>
            </a>
        </div>

        <Container class="mt-6 w-full max-w-md">
            {{ $slot }}
        </Container>
    </div>
</x-base-layout>