<template>
  <div>
      <div class="row" v-if="businesses.length>0">
          <div class="col-md-6" v-for="( business, i) in businesses" :key="i">
              <BusinessCard :business="business" :key="'business'+i"></BusinessCard>
          </div>
      </div>
      <div class="row" v-else>
          <Empty></Empty>
      </div>

  </div>
</template>
<script>
import BusinessCard from "../BusinessCard";
import Empty from "../common/empty"
export default {
    components: {
        BusinessCard, Empty
    },
    computed: {
        businesses(){
            return this.$store.state.businesses;
        }
    }
}
</script>
<style scoped>
</style>
