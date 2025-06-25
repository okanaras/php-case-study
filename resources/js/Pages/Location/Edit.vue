<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import BackListButton from '@/Components/Buttons/BackListButton.vue';

const props = defineProps({
    location: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.location.name,
    latitude: props.location.latitude,
    longitude: props.location.longitude,
    color_hex: props.location.color_hex,
});

const submit = () => {
    form.put(route('locations.update', props.location), {
        preserveState: false,
    });
};
</script>

<template>
    <Head title="Location Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Location Edit
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

                            <form
                                @submit.prevent="submit"
                                class="mx-auto space-y-6 rounded-lg bg-white p-8 shadow-md dark:bg-gray-900"
                            >
                                <div>
                                    <InputLabel for="name" value="Name" />
                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full rounded border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-800"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.name"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="latitude"
                                        value="Latitude"
                                    />
                                    <TextInput
                                        id="latitude"
                                        type="number"
                                        step="0.00000001"
                                        min="-90"
                                        max="90"
                                        class="mt-1 block w-full rounded border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-800"
                                        v-model="form.latitude"
                                        required
                                        autocomplete="off"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.latitude"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="longitude"
                                        value="Longitude"
                                    />
                                    <TextInput
                                        id="longitude"
                                        type="number"
                                        step="0.00000001"
                                        min="-180"
                                        max="180"
                                        class="mt-1 block w-full rounded border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-800"
                                        v-model="form.longitude"
                                        required
                                        autocomplete="off"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.longitude"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="color_hex"
                                        value="Pick a Color"
                                    />
                                    <TextInput
                                        id="color_hex"
                                        type="color"
                                        class="mt-1 block h-10 w-20 cursor-pointer rounded border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-800"
                                        v-model="form.color_hex"
                                        required
                                        autocomplete="color_hex"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.color_hex"
                                    />
                                </div>

                                <div class="flex justify-end">
                                    <PrimaryButton
                                        :class="{
                                            'cursor-not-allowed opacity-50':
                                                form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Submit
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
