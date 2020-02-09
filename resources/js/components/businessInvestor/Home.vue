<template>
  <div>
    <div class="row mb-4">
      <div class="col">
        <h2 class="mb-0">Dashboard</h2>
      </div>
    </div>
    <div class="row">
      <!-- <div class="col-md mb-3">
        <div class="card p-3">
          <div class="media align-items-center">
            <span class="icon business-icon mr-3">
              <i class="fas fa-lightbulb"></i>
            </span>
            <div>
              <h6 class="mb-2">Purchased Businesses</h6>
              <PageSpinner v-if="!myBusiness"></PageSpinner>
              <span v-else class="text-secondary">
                {{
                myBusiness.length
                }}
              </span>
            </div>
          </div>
        </div>
      </div>-->
      <div class="col-md mb-3">
        <div class="card p-3">
          <div class="media align-items-center">
            <span class="icon purchased-icon mr-3">
              <i class="fas fa-handshake"></i>
            </span>
            <div>
              <h6 class="mb-2">Total Purchased</h6>
              <span class="text-secondary">0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card p-3">
          <div class="media align-items-center">
            <span class="icon balance-icon mr-3">
              <i class="fas fa-money-bill-alt"></i>
            </span>
            <div>
              <h6 class="mb-2">Total Spent</h6>
              <span class="text-secondary">&#x20a6; 0.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-4">
      <div class="col">
        <h2 class="mb-0">Recent Purchase</h2>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md">
        <table class="table table-light">
          <thead>
            <tr class="font-light">
              <th>ID</th>
              <th>Business</th>
              <th>Date</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody class="text-center"></tbody>
        </table>
        <div class="text-center">
          <span>No purchase yet</span>
        </div>
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
    ...mapState("investor", {
      myBusiness: state => state.businesses
    })
  },
  async created() {
    await this.$store.dispatch("getBusinesses");
    await this.$store.dispatch("investor/getBusinesses");
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
