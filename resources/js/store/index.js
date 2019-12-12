import vue from "vue";
import vuex from "vuex";
import Axios from "axios";


vue.use(vuex);

export default new vuex.Store({
    state: {
        toLogin: true,
        businesses: [],
    },
    mutations: {
        toggleToLogin( state ){
            state.toLogin = !state.toLogin;
        },
        setBusinesses( state, businesses ){
            state.businesses = businesses;
        }
    },
    actions: {
        getBusinesses( context ){
            Axios.get("/api/business")
                .then(response => {
                    context.commit( "setBusinesses", response.data );
                    console.log('dd');
                })
                .catch( console.log );
        },
        getBusiness( context, index ){
            console.log(index)
            console.log(context.state.businesses);
            return context.state.businesses[index];
        }
    },
})
