<template>

  <nav class="flex justify-between bg-gray-50 text-gray-700 border border-gray-200 py-3 px-5 rounded-lg dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <div class="flex items-center py-4 overflow-y-auto whitespace-nowrap">
      <div class="">
      <Link :href="route('home')"
            class="flex flex-inline text-pink-500 dark:text-gray-200"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        <span class="text-pink-500 font-black uppercase px-2">
          Beerz
        </span>
      </Link>

      </div>

      <span class="mx-5 text-gray-500 dark:text-gray-300">
            /
        </span>


      <div v-for="(category, index) in categories">
        <Link
            class="text-gray-600
            dark:text-gray-200
            font-black
            uppercase
            px-2
            hover:text-pink-500
            hover:underline-offset-8
            active:text-pink-500"
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
    <div class="flex flex-inline justify-end">
      <button
          @click="openCart"
          class="relative inline-block hover:text-pink-500">

        <i class="las la-shopping-cart la-2x ">

        </i>
        <span
            v-if="true"
            class="
            absolute
            -top-1.5
            -left-4
            p-1
            text-xs
            text-white
            bg-pink-500
            rounded-full"
        >
          {{ count }}
        </span>
        <span class="">cart</span>
      </button>

    </div>
  </nav>


</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";
import {useStore} from "vuex";
import {computed, watch} from "vue";

const props = defineProps({
  categories: Object
})

const store = useStore()

let count = computed(() => store.getters.getCount)




const openCart = () => {
  Inertia.get(route('cart'))
}

</script>

<style scoped>

</style>