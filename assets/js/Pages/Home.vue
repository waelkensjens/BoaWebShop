<template>
  <div class="bg-white flex">
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Our products</h2>
      <div class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-4 xl:gap-x-8">
        <div
            v-for="product in props.products"
            class="group relative">
            <Product :product="product"/>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout"

export default {
  layout: Layout,
}
</script>

<script setup>
import Header from '@/Shared/Header'
import Routing from '@/Routing'
import image from '../../images/beer.jpg'
import Product from '@/Shared/Product'
const props = defineProps({
    products: Object,
})



</script>

<style scoped>

</style>