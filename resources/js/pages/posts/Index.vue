<script setup lang="ts">
import { PageProps } from '@inertiajs/core';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import PaginationCollection from '@/components/PaginationCollection.vue'
import PostCard from '@/components/PostCard.vue';

export interface Post {
    title: string
    slug: string
    content: string
    published_at: string
    author: {
        name: string
    }
}

export interface CollectionLink {
    url: string | null
    label: string
    active: boolean
}

interface PostProps extends PageProps{
    posts: {
        data: Post[]
        current_page: number
        per_page: number
        total: number
        links: CollectionLink[]
    }
}

const { props } = usePage<PostProps>()

const posts = computed(() => props.posts.data ?? [])
const links = computed(() => props.posts.links ?? [])

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
            <div class="relative min-h-[100vh] p-4 flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min flex flex-col">
                <PostCard 
                    v-for="post in posts" 
                    class="my-4" 
                    :post="post" 
                />
                <PaginationCollection class="mt-12" :links="links" />
            </div>
        </div>
    </AppLayout>
</template>
