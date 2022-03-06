<template>
<Header
:categories="$page.props.data.categories"
/>
  <slot/>
  <Footer/>
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
  data: Object
})

</script>

<style scoped>

</style>