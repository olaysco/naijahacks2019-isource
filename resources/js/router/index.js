import VueRouter from "vue-router";
import Vue from "vue";
import NProgress from "nprogress";
import Home from "../components/Home";
import BusinessOwnerHome from "../components/businessOwner/Home";
import BusinessInvestorHome from "../components/businessInvestor/Home";
import BusinessPage from "../components/BusinessPage";
import BusinessForm from "../components/businessOwner/BusinessForm";
import Search from "../components/Search";
import SearchResult from "../components/SearchResult";
import Login from "../components/Login";
import Register from "../components/Register";

Vue.use(VueRouter);

const routes = [
    { path: "/", component:Home },
    { path: "/home", component:Home },
    { path: "/search", component:Search },
    { path: "/businessOwner", component:BusinessOwnerHome },
    { path: "/businessInvestor", component:BusinessInvestorHome },
    { path: "/business/:id", component:BusinessPage },
    { path: "/add/business", component:BusinessForm },
    { path: "/search/result", component:SearchResult },
    { path: "/login", component:Login },
    { path: "/register", component: Register }
]

const router = new VueRouter({
    mode: "history",
    routes
});

router.beforeResolve((to, from, next) => {
    NProgress.start()
next()
});
router.afterEach((to, from) => {
    NProgress.done()

});

export default router;
