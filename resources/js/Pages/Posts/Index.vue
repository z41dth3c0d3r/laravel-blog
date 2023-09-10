<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    posts: {
        type: Array,
        required: true,
    },
    message: {
        type: String,
    },
});
</script>

<template>
    <Head title="Posts" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-end">
                            <Link :href="route('posts.create')">
                                <PrimaryButton>Create post</PrimaryButton>
                            </Link>
                        </div>

                        <table class="table border w-full border-collapse mt-4">
                            <thead>
                                <tr class="border">
                                    <th class="text-left py-2">Title</th>
                                    <th class="text-left py-2">Content</th>
                                    <th class="text-left py-2">Created At</th>
                                    <th class="text-left py-2">Updated At</th>
                                    <th class="text-left py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border" v-for="post in posts">
                                    <td class="text-left py-2">
                                        {{ post.title }}
                                    </td>
                                    <td class="text-left py-2">
                                        {{ post.content }}
                                    </td>
                                    <td class="text-left py-2">
                                        {{
                                            new Date(
                                                post.created_at
                                            ).toDateString()
                                        }}
                                    </td>
                                    <td class="text-left py-2">
                                        {{
                                            new Date(
                                                post.updated_at
                                            ).toDateString()
                                        }}
                                    </td>
                                    <td class="text-left py-2">
                                        <div class="flex gap-2">
                                            <Link
                                                :href="
                                                    route('posts.edit', post)
                                                "
                                                method="get"
                                                as="button"
                                            >
                                                <PrimaryButton
                                                    >Edit</PrimaryButton
                                                >
                                            </Link>
                                            <Link
                                                :href="
                                                    route('posts.destroy', post)
                                                "
                                                method="delete"
                                                as="button"
                                            >
                                                <SecondaryButton
                                                    >Delete</SecondaryButton
                                                >
                                            </Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end" v-if="message">
                            <p class="mt-4 text-green-600">{{ message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
