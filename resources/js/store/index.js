import vue from "vue";
import vuex from "vuex";
import Axios from "axios";


vue.use(vuex);

export default new vuex.Store({
    state: {
        toLogin: true,
        businesses: [],
        searchData: null,
        searchResult: null,
        searching: false,
    },
    mutations: {
        toggleToLogin( state ){
            state.toLogin = !state.toLogin;
        },
        setBusinesses( state, businesses ){
            state.businesses = businesses;
        },
        setSearchData( state, searchData ){
            state.searchData = searchData;
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
        },
        search( { state } ){
            state.searching = true;
            Axios.post('/api/business/search', state.searchData)
                .then( response => {
                    state.searchResult = response.data;
                })
                .catch( console.log )
                .finally( e => {
                    state.searching = false;
                });
        }
    },
})
