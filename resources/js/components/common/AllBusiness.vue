<template>
  <div>
      <div class="row">
          <div class="col-md-6" v-for="i in [1,2,3,4,5,6,7,9]" :key="i">
              <BusinessCard></BusinessCard>
          </div>
      </div>

  </div>
</template>
<script>
import BusinessCard from "./BusinessCard";
export default {
    components: {
        BusinessCard
    }
}
</script>
<style scoped>
</style>
