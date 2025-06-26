<script setup>
const props = defineProps({
    fromLatitude: {
        type: [Number, String],
        required: true,
    },
    fromLongitude: {
        type: [Number, String],
        required: true,
    },
    toLatitude: {
        type: [Number, String],
        required: true,
    },
    toLongitude: {
        type: [Number, String],
        required: true,
    },
});

const apiKey = import.meta.env.VITE_GOOGLE_MAPS_API_KEY;
</script>

<template>
    <iframe
        class="h-full w-full"
        style="border: 0"
        loading="lazy"
        allowfullscreen
        :src="`https://www.google.com/maps/embed/v1/directions?key=${apiKey}&origin=${props.fromLatitude},${props.fromLongitude}&destination=${props.toLatitude},${props.toLongitude}`"
    ></iframe>
</template>
