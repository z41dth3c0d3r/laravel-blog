<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    post: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head :title="post.title" />
    <HomeLayout :can-login="canLogin" :can-register="canRegister">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-12"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-4xl">
                            {{ post.title }}
                            <span class="text-sm">by {{ post.user.name }}</span>
                        </h1>
                        <div class="mb-4">
                            <small class="text-sm text-gray-600">{{
                                dayjs(post.created_at).fromNow()
                            }}</small>
                            <small
                                v-if="post.created_at !== post.updated_at"
                                class="text-sm text-gray-600"
                            >
                                &middot; edited
                                {{ dayjs(post.updated_at).fromNow() }}</small
                            >
                        </div>
                        <hr />
                        <div class="mt-4">
                            <p>{{ post.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
