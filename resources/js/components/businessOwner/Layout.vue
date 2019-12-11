<template>
  <div class="d-flex min-height-100vh flex-column ">
        <section class="header"><Header></Header></section>
        <section class="main"><slot></slot></section>
        <section class="footer mt-auto"><Footer></Footer></section>
  </div>

</template>
<script>
import Footer from "../common/Footer.vue";
import Header from "../common/Header";
import AllBusiness from "../common/AllBusiness"
export default {
    components: {
        Header, AllBusiness, Footer
    }
}
</script>
<style scoped>
.min-height-100vh{min-height: 100vh;}
</style>
