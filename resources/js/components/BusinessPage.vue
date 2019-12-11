<template>
  <div>
        <Header></Header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <SingleBusiness></SingleBusiness>
                </div>
            </div>
        </div>

        <section class="footer">
            <Footer></Footer>
        </section>
  </div>

</template>
<script>
import Header from "./common/Header";
import AllBusiness from "./common/AllBusiness";
import SingleBusiness from "./common/SingleBusiness";
import Footer from "./Footer";
export default {
    components: {
        Header, AllBusiness, SingleBusiness, Footer
    }
}
</script>
<style scoped>
</style>
