<template>
  <div>
    <div class="row mb-4">
      <div class="col d-flex align-items-center justify-content-between">
        <h2 class="mb-0">My Businesses</h2>
        <span>
          <a href="#" @click.prevent="toggleView">
            <i class="fas fa-th" :class="{'not_active_view': ( !GRID_VIEW)}"></i>
          </a>
          <a href="#" @click.prevent="toggleView">
            <i class="fas fa-list ml-2" :class="{'not_active_view': ( !LIST_VIEW)}"></i>
          </a>
        </span>
      </div>
    </div>
    <div class="container-fluid mb-4" v-if="myBusinesses">
      <div class="row" v-if="GRID_VIEW ">
        <div class="col-md-6" v-for="(business, i) in myBusinesses" :key="i">
          <BusinessCard :business="business" :key="'business' + i" :index="business.id"></BusinessCard>
        </div>
      </div>
      <div class="row" v-else>
        <BusinessList :businesses="myBusinesses"></BusinessList>
      </div>
    </div>
    <div v-else>
      <div class="pseudo-business project-card">
        <PageSkeleton></PageSkeleton>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
import Layout from "./Layout";
import AllBusiness from "../common/AllBusiness";
import PageSpinner from "../common/PageSpinner";
import BusinessCard from "../BusinessCard";
import PageSkeleton from "../common/PageSkeleton";
import BusinessList from "../common/BusinessList";

export default {
  components: {
    Layout,
    AllBusiness,
    PageSpinner,
    PageSkeleton,
    BusinessCard,
    BusinessList
  },
  data: function() {
    return { GRID_VIEW: true, LIST_VIEW: false };
  },
  computed: {
    ...mapState("owner", {
      myBusinesses: state => state.businesses
    })
  },
  methods: {
    toggleView() {
      this.GRID_VIEW = !this.GRID_VIEW;
      this.LIST_VIEW = !this.LIST_VIEW;
    }
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
.not_active_view {
  color: aliceblue;
}
</style>
