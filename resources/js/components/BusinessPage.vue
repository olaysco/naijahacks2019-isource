<template>
  <div>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <SingleBusiness :id="id"></SingleBusiness>
                </div>
            </div>
        </div>
    </Layout>
  </div>

</template>
<script>
import AllBusiness from "./common/AllBusiness";
import SingleBusiness from "./common/SingleBusiness";
import Layout from "./Layout";
export default {
    components: {
        Layout, AllBusiness, SingleBusiness
    },
    computed:{
        id(){ return this.$route.params.id }
    }
}
</script>
<style scoped>
</style>
