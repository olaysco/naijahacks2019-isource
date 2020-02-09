<template>
    <div>
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-0">My Businesses</h2>
            </div>
        </div>
        <div class="row mb-4" v-if="myBusinesses">
            <div
                class="col-md-6"
                v-for="(business, i) in myBusinesses"
                :key="i"
            >
                <BusinessCard
                    :business="business"
                    :key="'business' + i"
                    :index="business.id"
                ></BusinessCard>
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
import BusinessCard from "../common/BusinessCard";
import PageSkeleton from "../common/PageSkeleton";
export default {
    components: {
        Layout,
        AllBusiness,
        PageSpinner,
        PageSkeleton,
        BusinessCard
    },
    computed: {
        ...mapState("owner", {
            myBusinesses: state => state.businesses
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
