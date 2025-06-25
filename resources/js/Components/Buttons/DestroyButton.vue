<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    title: {
        type: String,
        default: 'record',
    },
    href: {
        type: String,
        required: true,
    },
});

const destroy = () => {
    if (confirm(`Are you sure to delete this ${props.title}?`)) {
        router.delete(props.href, {
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <div
        class="btn-sm flex w-fit cursor-pointer rounded bg-red-600 px-4 py-2 text-white shadow-md transition duration-300 hover:bg-red-900"
        @click="destroy"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            viewBox="0 0 24 24"
        >
            <path
                fill="currentColor"
                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"
            />
        </svg>
    </div>
</template>
