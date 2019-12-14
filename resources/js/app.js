require('./bootstrap');
window.Vue = require('vue');
import NProgress from "nprogress";
import router from "./router"
import App from "./components/App";
import store from "./store";
import Antd from "ant-design-vue";
import "ant-design-vue/dist/antd.css";
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.use(Antd);
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
window.fire = new Vue();
window.NProgress = NProgress;
new Vue({
    el: '#app',
    router,
    store,
    components: {App},
    data(){
        return {
        }
    }
}).$mount('#app');
