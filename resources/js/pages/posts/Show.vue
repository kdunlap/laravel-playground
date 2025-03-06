<script setup lang="ts">
import { PageProps } from '@inertiajs/core';
import { Head, usePage } from '@inertiajs/vue3';
import { useDateFormat } from '@vueuse/core';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Post } from './Index.vue';

interface ShowProps extends PageProps{
    post: Post
}

const { props } = usePage<ShowProps>()
const { title, slug, published_at, author, content } = props.post

const formattedPublishedAt = useDateFormat(Date.parse(published_at), 'M/D/YYYY')

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
    {
        title: title,
        href: `/posts/${ slug }`,
    },
];
</script>

<template>
    <Head :title="title" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] p-4 flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min flex flex-col">
                <h1 class="text-2xl font-bold">{{ title }}</h1>
                <p class="text-xs">Published {{ formattedPublishedAt }} by {{  author.name }}</p>
                <div class="mt-8">{{ content }}</div>
            </div>
        </div>
    </AppLayout>
</template>
