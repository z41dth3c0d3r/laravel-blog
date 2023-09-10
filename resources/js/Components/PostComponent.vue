<template>
    <div
        class="flex-col scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
    >
        <Link :href="route('posts.show', post)" class="mb-2">
            <div>
                <h2
                    class="text-3xl font-semibold text-gray-900 dark:text-white self-end"
                >
                    {{ post.title }}
                    <span class="text-sm">by {{ post.author }}</span>
                </h2>
                <p
                    class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                >
                    {{ post.content }}
                </p>
            </div>
        </Link>
        <hr />
        <div class="mt-4">
            <small class="text-sm text-gray-600">{{
                dayjs(post.created_at).fromNow()
            }}</small>
            <small
                v-if="post.created_at !== post.updated_at"
                class="text-sm text-gray-600"
            >
                &middot; edited {{ dayjs(post.updated_at).fromNow() }}</small
            >
        </div>
    </div>
</template>

<script setup>
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import { Link } from "@inertiajs/vue3";
dayjs.extend(relativeTime);

defineProps({
    post: {
        type: Object,
        required: true,
    },
});
</script>
