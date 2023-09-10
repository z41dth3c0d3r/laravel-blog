<script setup>
import { Head } from "@inertiajs/vue3";
import PostComponent from "@/Components/PostComponent.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    posts: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <HomeLayout :can-login="canLogin" :can-register="canRegister">
        <div class="p-6 lg:p-8">
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <PostComponent :post="post" v-for="post in posts" />
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
