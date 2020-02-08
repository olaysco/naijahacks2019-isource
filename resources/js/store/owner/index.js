const owner = {
    namespaced: true,
    state: {
        user: "",
        businesses: []
    },
    mutations: {
        setBusinesses(state, businesses) {
            state.businesses = businesses;
        }
    },
    actions: {
        getBusinesses(context) {
            Axios.get("/api/owner/business")
                .then(response => {
                    // context.commit("setBusinesses", response.data);
                    console.log(response);
                })
                .catch(console.log);
        }
    }
};

export default owner;
