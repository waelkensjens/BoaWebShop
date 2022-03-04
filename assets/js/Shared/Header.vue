<template>

  <nav class="flex justify-between bg-gray-50 text-gray-700 border border-gray-200 py-3 px-5 rounded-lg dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <div class="div">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a :href="Routing.generate('home')" class="text-sm text-gray-700 hover:text-gray-900 inline-flex items-center dark:text-gray-400 dark:hover:text-white">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          </a>
        </li>

        <li
            v-for="category in categories"
            class="inline-flex items-center">
          <a
              href="" class="text-sm text-gray-700 hover:text-gray-900 inline-flex items-center dark:text-gray-400 dark:hover:text-white">
            {{ category.name }}
          </a>
        </li>
      </ol>
    </div>
    <div class="flex justify-end">
      <a
          href="">
        <i class="las la-shopping-cart w-28">cart</i>
      </a>
    </div>
  </nav>

</template>

<script setup>
import Routing from '@/Routing'

const props = defineProps({
  categories:Object
})



</script>

<style scoped>

</style>