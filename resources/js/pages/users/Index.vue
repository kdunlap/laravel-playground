<script setup lang="ts">
import { PageProps } from '@inertiajs/core';
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

interface User {
    name: string
    email: string
}

interface UserProps extends PageProps{
    users: User[]
}

const page = usePage<UserProps>()

const users = computed(() => page.props.users ?? [])

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: '/users',
    },
];
</script>

<template>
    <Head title="Users" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <ul class="p-4">
                    <li v-for="user in users" class="mt-2">
                        {{ user.name }} ({{ user.email }})
                    </li>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
