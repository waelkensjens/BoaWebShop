<template>

  <nav class="flex justify-between bg-gray-50 text-gray-700 border border-gray-200 py-3 px-5 rounded-lg dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <div class="flex items-center py-4 overflow-y-auto whitespace-nowrap">
      <Link :href="route('home')"
            class="text-gray-600 dark:text-gray-200"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
      </Link>

      <span class="mx-5 text-gray-500 dark:text-gray-300">
            /
        </span>


      <div v-for="(category, index) in $page.props.categories">
        <Link class="text-gray-600 dark:text-gray-200 hover:underline"
              :href="route('categories.show', {name: category.name})"
        >
          {{category.name}}
        </Link>
      <span
          v-if="index !== (categories.length -1)"
          class="mx-5 text-gray-500 dark:text-gray-300">
            /
        </span>
      </div>
    </div>
    <div class="flex justify-end">
      <a
          href="">
        <i class="las la-shopping-cart w-28">cart</i>
        <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v1.png"/>
      </a>
    </div>
  </nav>

</template>

<script setup>
import Routing from '@/Routing'
import { Link } from '@inertiajs/inertia-vue3'
import { usePage } from '@inertiajs/inertia-vue3'

const props = defineProps({
  categories: Object
})

</script>

<style scoped>

</style>