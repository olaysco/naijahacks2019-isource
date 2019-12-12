<template>
  <div>
        <Layout page="AllBusiness">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <AllBusiness></AllBusiness>
                    </div>
                    <div class="col-md-3 ">
                        <div>
                            <router-link to="/add/business" class="btn btn-secondary w-100">Add Business <i class="fa fa-plus"></i></router-link>
                        </div>
                        <div class=" col-md-2 position-fixed h-80v d-flex justify-contnet-center flex-column align-items-center">
                            <img src="/img/bizskills.jpg" alt="biz-skill" class="img-responsive mt-auto">
                            <small>ads by adver</small>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
  </div>

</template>
<script>
import Layout from "./Layout";
import AllBusiness from "../common/AllBusiness";
export default {
    components: {
        Layout, AllBusiness
    },
    async created(){
        await this.$store.dispatch( 'getBusinesses' );
    }
}
</script>
<style scoped>
</style>
