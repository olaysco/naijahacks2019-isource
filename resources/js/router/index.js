import VueRouter from "vue-router";
import Vue from "vue";
import Home from "../components/Home";
import BusinessOwnerHome from "../components/businessOwner/Home";
import BusinessInvestorHome from "../components/businessInvestor/Home";
Vue.use(VueRouter);

const routes = [
    { path: "/", component:Home },
    { path: "/home", component:Home },
    {  path: "/businessOwner", component:BusinessOwnerHome },
    {  path: "/businessInvestor", component:BusinessInvestorHome },
]

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
