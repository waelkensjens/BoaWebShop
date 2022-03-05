<template>
  <div class="bg-white flex">
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">{{ category.name }}</h2>
      <div class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

        <div
            v-for="product in category.products"
            class="group relative">
          <Product
            :product="product"
          />
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import Layout from "@/Shared/Layout";

export default {
  name: "Index",
  layout: Layout
}
</script>
<script setup>
import image from '../../../images/beer.jpg'
import Product from '@/Shared/Product'


import {computed} from "vue";

const props = defineProps({
  product: Object,
  category: Object
})

</script>

<style scoped>

</style>