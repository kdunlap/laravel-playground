<script setup lang="ts">
import { PageProps } from '@inertiajs/core';
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

interface Post {
    title: string
    content: string
}

interface PostProps extends PageProps{
    posts: Post[]
}

const page = usePage<PostProps>()

const posts = computed(() => page.props.posts ?? [])

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
];
</script>

<template>
    <Head title="Posts" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <ul class="p-4">
                    <li v-for="post in posts" class="mt-2">
                        {{ post.title }}
                    </li>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
