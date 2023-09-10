<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextAreaInput from "@/Components/TextAreaInput.vue";

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    id: props.post.id,
    title: props.post.title,
    content: props.post.content,
});
</script>

<template>
    <Head title="Edit post" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Edit post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form
                            @submit.prevent="
                                form.put(route('posts.update', post), {
                                    onSuccess: () => form.reset(),
                                })
                            "
                        >
                            <div>
                                <InputLabel for="title" value="Title" />

                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="content" value="Content" />

                                <TextAreaInput
                                    id="content"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.content"
                                    required
                                />
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-end">
                                    <PrimaryButton :disabled="form.processing"
                                        >Edit</PrimaryButton
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
