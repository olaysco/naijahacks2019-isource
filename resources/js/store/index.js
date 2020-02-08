import vue from "vue";
import vuex from "vuex";
import Axios from "axios";
import owner from "./owner";

vue.use(vuex);

export default new vuex.Store({
    modules: {
        owner
    },
    state: {
        toLogin: true,
        user: window.user,
        businesses: [],
        searchData: null,
        searchResult: null,
        searching: false
    },
    mutations: {
        toggleToLogin(state) {
            state.toLogin = !state.toLogin;
        },
        setBusinesses(state, businesses) {
            state.businesses = businesses;
        },
        setSearchData(state, searchData) {
            state.searchData = searchData;
        }
    },
    actions: {
        getBusinesses(context) {
            Axios.get("/api/businesses")
                .then(response => {
                    context.commit("setBusinesses", response.data);
                })
                .catch(console.log);
        },
        getBusiness(context, index) {
            return context.state.businesses[index];
        },
        getBusinessById(context, id) {
            let businesses = context.state.businesses;
            let found = businesses.find(business => business.id == id);
            return found;
        },
        logout(context) {
            Axios.post("/logout").then(response => {
                (window.user = null), (window.location = "/");
            });
        },
        search({ state }) {
            state.searching = true;
            Axios.post("/api/business/search", state.searchData)
                .then(response => {
                    state.searchResult = response.data;
                })
                .catch(console.log)
                .finally(e => {
                    state.searching = false;
                });
        }
    }
});
