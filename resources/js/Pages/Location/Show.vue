<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import BackListButton from '@/Components/Buttons/BackListButton.vue';
import GoogleMap from '@/Components/GoogleMap.vue';

const props = defineProps({
    location: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Location Show" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Location Details
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="relative overflow-x-auto">
                            <BackListButton
                                :href="route('locations.index')"
                                class="mb-4"
                            />

                            <div
                                class="grid grid-cols-1 gap-6 rounded-lg bg-white p-8 shadow-md sm:grid-cols-2 dark:bg-gray-900"
                            >
                                <div>
                                    <h3 class="mb-1 text-lg font-semibold">
                                        Name
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        {{ props.location.name }}
                                    </p>
                                </div>
                                <div>
                                    <h3 class="mb-1 text-lg font-semibold">
                                        Color
                                    </h3>
                                    <div
                                        class="h-12 w-12 rounded border border-gray-300 dark:border-gray-700"
                                        :style="{
                                            backgroundColor:
                                                props.location.color_hex,
                                        }"
                                    ></div>
                                </div>
                                <div>
                                    <h3 class="mb-1 text-lg font-semibold">
                                        Latitude
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        {{ props.location.latitude }}
                                    </p>
                                </div>
                                <div>
                                    <h3 class="mb-1 text-lg font-semibold">
                                        Longitude
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        {{ props.location.longitude }}
                                    </p>
                                </div>
                            </div>
                            <div
                                class="mt-2 flex items-center justify-center rounded-lg bg-white p-8 shadow-md dark:bg-gray-900"
                            >
                                <GoogleMap
                                    :latitude="Number(props.location.latitude)"
                                    :longitude="
                                        Number(props.location.longitude)
                                    "
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
