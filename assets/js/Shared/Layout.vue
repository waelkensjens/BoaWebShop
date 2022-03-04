<template>
<Header
:categories="categories"
/>
  <slot />
  <footer/>
</template>

<script>
export default {
  name: "Layout"
}
</script>

<script setup>
import Footer from "./Footer";
import Header from "./Header"



const props = defineProps({
  categories: Object
})

</script>

<style scoped>

</style>