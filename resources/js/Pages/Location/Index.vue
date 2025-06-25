<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

import DestroyButton from '@/Components/Buttons/DestroyButton.vue';
import EditButton from '@/Components/Buttons/EditButton.vue';
import ShowButton from '@/Components/Buttons/ShowButton.vue';
import Pagination from '@/Components/Pagination.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    locations: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Locations" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Locations
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="relative overflow-x-auto">
                            <div class="mb-4 flex items-center justify-end">
                                <Link :href="route('locations.create')">
                                    <SecondaryButton>Create</SecondaryButton>
                                </Link>
                            </div>

                            <table
                                class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400"
                            >
                                <thead
                                    class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Latitude
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Longitude
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Color
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-right"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!props.locations.data.length">
                                        <td
                                            colspan="6"
                                            class="px-6 py-4 text-center"
                                        >
                                            No locations found.
                                        </td>
                                    </tr>
                                    <tr
                                        class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
                                        v-for="location in props.locations.data"
                                        :key="location.id"
                                    >
                                        <td class="px-6 py-4">
                                            {{ location.id }}
                                        </td>
                                        <th
                                            scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                        >
                                            {{ location.name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ location.latitude }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ location.longitude }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-3"
                                            >
                                                <span
                                                    class="text-sm text-gray-700 dark:text-gray-300"
                                                >
                                                    {{ location.color_hex }}
                                                </span>
                                                <span
                                                    class="inline-block h-4 w-4 rounded-full border border-gray-300 dark:border-gray-600"
                                                    :style="{
                                                        backgroundColor:
                                                            location.color_hex,
                                                    }"
                                                ></span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <ShowButton
                                                    :href="
                                                        route(
                                                            'locations.show',
                                                            location.id,
                                                        )
                                                    "
                                                />
                                                <EditButton
                                                    :href="
                                                        route(
                                                            'locations.edit',
                                                            location.id,
                                                        )
                                                    "
                                                />
                                                <DestroyButton
                                                    :href="
                                                        route(
                                                            'locations.destroy',
                                                            location.id,
                                                        )
                                                    "
                                                    title="location"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <Pagination
                                :data="props.locations"
                                v-if="props.locations.data.length"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
