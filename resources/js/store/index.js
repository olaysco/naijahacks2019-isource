import vue from "vue";
import vuex from "vuex";


vue.use(vuex);

export default new vuex.Store({
    state: {
        toLogin: true
    },
    mutations: {
        toggleToLogin(state){
            state.toLogin = !state.toLogin;
        }
    },
    actions: {

    },
})
