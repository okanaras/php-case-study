<script setup>
const props = defineProps({
    latitude: {
        type: Number,
        required: true,
    },
    longitude: {
        type: Number,
        required: true,
    },
});

const apiKey = import.meta.env.VITE_GOOGLE_MAPS_API_KEY;
</script>

<template>
    <div class="aspect-[16/9] w-full">
        <iframe
            class="h-full w-full"
            style="border: 0"
            referrerpolicy="no-referrer-when-downgrade"
            :src="`https://www.google.com/maps/embed/v1/place?key=${apiKey}&q=${props.latitude},${props.longitude}`"
            allowfullscreen
        ></iframe>
    </div>
</template>
