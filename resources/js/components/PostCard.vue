<script setup lang="ts">
import { type Post } from '@/pages/posts/Index.vue';
import { defineProps, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useDateFormat } from '@vueuse/core';

interface PostCardProps {
    post: Post
}

const props = defineProps<PostCardProps>()
const { title, published_at, author, slug } = props.post

const formattedPublishedAt = useDateFormat(Date.parse(published_at), 'M/D/YYYY')

const linkUrl = computed(() => `${ route('posts.show', [slug]) }`)

</script>

<template>
    <div>
        <h3 class="text-lg font-bold">
            <Link :href="linkUrl">{{ title }}</Link>
        </h3>
        <p class="text-xs">Published {{ formattedPublishedAt }} by {{  author.name }}</p>
        <Link class="border rounded-sm border-gray-600 px-2 text-sm mt-2" :href="linkUrl">View</Link>
    </div>
</template>
