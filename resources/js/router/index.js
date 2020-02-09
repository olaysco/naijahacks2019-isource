import VueRouter from "vue-router";
import Vue from "vue";
import NProgress from "nprogress";
import Home from "../components/Home";
import OwnerHome from "../components/businessOwner/Home";
import OwnerBusinesses from "../components/businessOwner/BusinessIndex";
import OwnerLayout from "../components/businessOwner/Layout";
import OwnerTransaction from "../components/businessOwner/OwnerTransaction";
import OwnerAccount from "../components/businessOwner/OwnerAccount";
import OwnerProfile from "../components/businessOwner/OwnerProfile";
import InvestorHome from "../components/businessInvestor/Home";
import InvestorLayout from "../components/businessInvestor/Layout";
import InvestorPurchased from "../components/businessInvestor/BusinessPurchased";
import InvestorProfile from "../components/businessInvestor/Profile";
import InvestorTransactions from "../components/businessInvestor/TransactionPage";
import InvestorDiscover from "../components/businessInvestor/DiscoverBusiness";
import BusinessPage from "../components/BusinessPage";
import BusinessForm from "../components/businessOwner/BusinessForm";
import Search from "../components/Search";
import SearchResult from "../components/SearchResult";
import Login from "../components/Login";
import Register from "../components/Register";

Vue.use(VueRouter);

const routes = [
    { path: "/", component: Home },
    { path: "/home", component: Home },
    { path: "/search", component: Search },
    {
        path: "/dashboard/1",
        component: OwnerLayout,
        children: [
            {
                path: "/",
                component: OwnerHome
            },
            {
                path: "businesses",
                component: OwnerBusinesses
            },
            {
                path: "account",
                component: OwnerAccount
            },
            {
                path: "profile",
                component: OwnerProfile
            },
            {
                path: "transactions",
                component: OwnerTransaction
            },
            {
                path: "new-business",
                component: BusinessForm
            }
        ]
    },
    {
        path: "/dashboard/2",
        component: InvestorLayout,
        children: [
            {
                path: "/",
                component: InvestorHome
            },
            {
                path: "purchased",
                component: InvestorPurchased
            },
            {
                path: "discover",
                component: InvestorDiscover
            },
            {
                path: "transactions",
                component: InvestorTransactions
            },
            {
                path: "profile",
                component: InvestorProfile
            }
        ]
    },
    { path: "/business/:id", component: BusinessPage },
    { path: "/add/business", component: BusinessForm },
    { path: "/search/result", component: SearchResult },
    { path: "/login", component: Login },
    { path: "/register", component: Register }
];

const router = new VueRouter({
    mode: "history",
    routes
});

router.beforeResolve((to, from, next) => {
    NProgress.start();
    next();
});
router.afterEach((to, from) => {
    NProgress.done();
});

export default router;
