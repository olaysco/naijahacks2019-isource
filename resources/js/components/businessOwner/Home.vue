<template>
  <div>
        <Header></Header>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <AllBusiness></AllBusiness>
                </div>
                <div class="col-md-3 ">
                    <div class="position-fixed h-80v d-flex justify-contnet-center flex-column align-items-center">
                        <img src="/img/bizskills.jpg" alt="biz-skill" class="img-responsive mt-auto">
                        <small>ads by adver</small>
                    </div>
                </div>
            </div>
        </div>
  </div>

</template>
<script>
import Header from "../common/Header";
import AllBusiness from "../common/AllBusiness"
export default {
    components: {
        Header, AllBusiness
    }
}
</script>
<style scoped>
</style>
