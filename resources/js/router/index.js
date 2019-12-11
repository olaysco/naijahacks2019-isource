import VueRouter from "vue-router";
import Vue from "vue";
import Home from "../components/Home";
import BusinessOwnerHome from "../components/businessOwner/Home";
import BusinessInvestorHome from "../components/businessInvestor/Home";
import BusinessPage from "../components/BusinessPage";
import BusinessForm from "../components/businessOwner/BusinessForm";
Vue.use(VueRouter);

const routes = [
    { path: "/", component:Home },
    { path: "/home", component:Home },
    { path: "/login", component:Home },
    { path: "/register", component:Home },
    {  path: "/businessOwner", component:BusinessOwnerHome },
    {  path: "/businessInvestor", component:BusinessInvestorHome },
    {  path: "/business", component:BusinessPage },
    {  path: "/add/business", component:BusinessForm },
]

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
