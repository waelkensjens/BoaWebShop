<template>
  <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md" >
      <img class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md" :src="image">
    </div>

    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
      <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">{{product.name}}</h3>

      <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
        <span class="font-bold text-gray-800 dark:text-gray-200">€{{product.priceExcl.toFixed(2)}}</span>
        <button
            @click="addItemToCart(product)"
            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add to cart</button>
      </div>
    </div>
  </div>

</template>

<script setup>
import image from '../../images/beer.jpg'
import {ref} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const props = defineProps({
  product: Object,
})
const cart = ref(usePage().props.value.data.cart)


import {useStore} from "vuex";
import {computed} from "vue";

const store = useStore()
const count = computed(() => store.state.count)

const increment = () => store.dispatch('increment')
const decrement = () => store.dispatch('decrement')
const addProduct = (product) => store.dispatch("addProduct", product)

const addItemToCart = (product) => {
  console.log('clicked')
  increment()
  addProduct(product)
    // Inertia.post(route('addToCart',
    //     {
    //       product: product,
    //       url: window.location.href
    //     }))
}
</script>

<style scoped>

</style>