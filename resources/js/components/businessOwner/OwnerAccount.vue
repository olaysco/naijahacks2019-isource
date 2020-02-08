<template>
  <div>
    <div class="row mb-4">
      <div class="col">
        <h2 class="mb-0">Manage Account</h2>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
import Layout from "./Layout";
import AllBusiness from "../common/AllBusiness";
import PageSpinner from "../common/PageSpinner";
export default {
  components: {
    Layout,
    AllBusiness,
    PageSpinner
  },
  computed: {
    ...mapState("owner", {
      myBusiness: state => state.businesses
    })
  },
  async created() {
    await this.$store.dispatch("getBusinesses");
    await this.$store.dispatch("owner/getBusinesses");
  }
};
</script>
<style scoped>
.icon {
  height: 60px;
  width: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
}
.business-icon {
  background-color: rgba(76, 175, 80, 0.2);
  color: #4caf50;
}
.balance-icon {
  background-color: rgba(233, 30, 99, 0.2);
  color: #e91e63;
}
.purchased-icon {
  color: #2196f3;
  background-color: rgba(33, 150, 243, 0.2);
}
th {
  font-weight: lighter;
}
</style>
