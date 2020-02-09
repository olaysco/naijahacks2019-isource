import Axios from "axios";

const owner = {
    namespaced: true,
    state: {
        user: false,
        businesses: false
    },
    mutations: {
        setBusinesses(state, businesses) {
            state.businesses = businesses;
        },
        setUser(state, user) {
            state.user = user;
        }
    },
    actions: {
        getBusinesses(context) {
            Axios.get("/api/investor/business")
                .then(response => {
                    context.commit("setBusinesses", response.data);
                })
                .catch(console.log);
        },
        getUser(context) {
            Axios.get("/api/investor")
                .then(response => {
                    context.commit("setUser", response.data);
                })
                .catch(console.log);
        }
    }
};

export default owner;
