<script setup lang="ts">
import { PageProps } from '@inertiajs/core';
import { ChevronLeft, ChevronsLeft, ChevronRight, ChevronsRight } from 'lucide-vue-next';
import { PaginationEllipsis, PaginationFirst, PaginationLast, PaginationList, PaginationListItem, PaginationNext, PaginationPrev, PaginationRoot } from 'radix-vue'

interface PaginationProps extends PageProps {
    total: number,
    perPage: number
}
 
const { total, perPage } = defineProps<PaginationProps>()
const page = defineModel('page')

</script>

<template>
  <PaginationRoot
    :total="total"
    :items-per-page="perPage"
    v-model="page"
    show-edges
  >
    <PaginationList
      v-slot="{ items }"
      class="flex items-center gap-1"
    >
      <PaginationFirst class="w-9 h-9 flex items-center justify-center disabled:opacity-50 focus-within:outline focus-within:outline-1 focus-within:outline-offset-1 rounded">
        <ChevronsLeft />
      </PaginationFirst>
      <PaginationPrev class="w-9 h-9 flex items-center justify-center mr-4 disabled:opacity-50 focus-within:outline focus-within:outline-1 focus-within:outline-offset-1 rounded">
        <ChevronLeft />
      </PaginationPrev>
      <template v-for="(page, index) in items">
        <PaginationListItem
          v-if="page.type === 'page'"
          :key="index"
          class="w-9 h-9 border rounded data-[selected]:bg-black/20 data-[selected]:text-whiteA11 hover:bg-black/10 transition focus-within:outline focus-within:outline-1 focus-within:outline-offset-1"
          :value="page.value"
        >
          {{ page.value }}
        </PaginationListItem>
        <PaginationEllipsis
          v-else
          :key="page.type"
          :index="index"
          class="w-9 h-9 flex items-center justify-center"
        >
          &#8230;
        </PaginationEllipsis>
      </template>
      <PaginationNext class="w-9 h-9 flex items-center justify-center ml-4 disabled:opacity-50 focus-within:outline focus-within:outline-1 focus-within:outline-offset-1 rounded">
        <ChevronRight />
      </PaginationNext>
      <PaginationLast class="w-9 h-9 flex items-center justify-center disabled:opacity-50 focus-within:outline focus-within:outline-1 focus-within:outline-offset-1 rounded">
        <ChevronsRight />
      </PaginationLast>
    </PaginationList>
  </PaginationRoot>
</template>