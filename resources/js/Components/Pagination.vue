<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
    preserveState: {
        type: Boolean,
        default: false,
    },
});

const changePage = (url) => {
    if (!url) return;

    const isProd = import.meta.env.PROD;
    if (isProd && url.startsWith('http://')) {
        url = url.replace(/^http:/, 'https:');
    }

    router.visit(url, {
        preserveScroll: true,
        preserveState: props.preserveState,
    });
};
</script>

<template>
    <div class="my-4 flex items-center justify-between px-5">
        <div class="">
            <span class="text-sm text-gray-600">
                Showing {{ data.from }} to {{ data.to }} of
                {{ data.total }} records.
            </span>
        </div>

        <div v-if="data.total > data.per_page" class="flex space-x-2">
            <ul class="flex space-x-2">
                <li v-for="(link, index) in data.links" :key="index">
                    <button
                        :class="[
                            'rounded border px-4 py-2',
                            link.active
                                ? 'bg-green-500 text-white'
                                : 'bg-white text-gray-700 hover:bg-gray-100',
                            !link.url
                                ? 'cursor-not-allowed bg-gray-400 text-gray-800 hover:bg-gray-800 hover:text-gray-500'
                                : '',
                        ]"
                        :disabled="!link.url"
                        @click="changePage(link.url)"
                        v-html="link.label"
                    ></button>
                </li>
            </ul>
        </div>
    </div>
</template>
