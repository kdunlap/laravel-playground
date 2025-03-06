<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ChevronLeft, ChevronRight } from 'lucide-vue-next';
import { CollectionLink } from '@/pages/posts/Index.vue';

interface PaginateCollectionProps {
    links: CollectionLink[]
}

const { links } = defineProps<PaginateCollectionProps>()
</script>

<template>
    <div class="flex flex-wrap">
        <template v-for="(link, index) in links" :key="link.label">
            <div 
                v-if="link.url === null" 
                class="mr-1 mb-1 px-2 py-1 text-sm leading-4 text-gray-300 border rounded"
            >
                <ChevronLeft v-if="index === 0" />
                <ChevronRight v-else-if="index === links.length - 1" />
                <span v-else>{{ link.label }}</span>
            </div>
            <Link v-else
                class="mr-1 mb-1 px-2 py-1 text-sm leading-4 flex items-center border rounded hover:bg-gray-200 focus:border-indigo-500 focus:text-indigo-500"
                :class="{ 'bg-gray-500 text-white hover:bg-gray-500': link.active }" 
                :href="link.url" 
            >
                <ChevronLeft v-if="index === 0" />
                <ChevronRight v-else-if="index === links.length - 1" />
                <span v-else>{{ link.label }}</span>
            </Link>
        </template>
    </div>
</template>
