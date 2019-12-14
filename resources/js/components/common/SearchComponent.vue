<template>
  <div>
    <div class="card br-8 bs-light border-0" id="login">
        <div class="card-header br-8 border-0 bg-white">
            <h4 class="text-center py-2">Discover a Business</h4>
        </div>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="Sector" class="text-dark">Sector</label>
                        <select id="sector" class="form-control" v-model="sector">
                            <option value="All">All</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Technology">Technology</option>
                            <option value="Education">Education</option>
                            <option value="Housing">Housing</option>
                            <option value="Health">Health</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Location</label>
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="text-dark">State</label>
                        <select id="location" class="form-control" name="location" v-model="state" @change="fetchCity()">
                            <option value="All">All</option>
                            <option v-for="(state,i) in states" :key="i">{{ state.name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="area" class="text-dark">Area</label>
                        <select id="area" class="form-control" name="city" v-model="area">
                            <option value="All">All</option>
                            <option v-for="(city,i) in cities" :key="i">{{ city}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="budget" class="text-dark">Budget</label>
                        <a-slider visible range :step="1000" :defaultValue="[5000, 500000]" v-model="value" :min="1000" :max="1000000" />
                    </div>
                </div>
                <div class=" form-group row">
                        <div class="col-md-12 text-center">
                            <div>  <a-tag key="tagv" :closable="false" v-html="`&#8358;${value[0].toLocaleString()} - &#8358;${value[1].toLocaleString()}`"></a-tag></div>
                        </div>
                    </div>
                <div class="form-group row mb-2">
                <div class="col-md-12 ">
                    <button @click.prevent="find" type="button" class="btn btn-secondary w-100" :disabled="searching">
                    Find Business
                    <span class="spinner-grow spinner-grow-sm" :class="{'d-none': !searching}" role="status" aria-hidden="true"></span>
                    </button>
                </div>
                </div>
            </div>
    </div>
  </div>
</template>
<script>

export default {
    data(){
        return {
            form: new Form({
                email: '',
                password: '',
                remember: false
            }),
            value: [5000, 500000],
            sector: 'All',
            state: 'All',
            area: '',
            states: [],
            cities: [],
        }
    },
    computed: {
        searching(){ return this.$store.state.searching }
    },
    methods: {
        fetchState(){
            let url="http://locationsng-api.herokuapp.com/api/v1/states";
            axios.get(url)
                .then(res =>{
                    this.states = res.data;
                })
                .catch(e=>{
                    console.log(e)
                })
        },
        fetchCity(){
            let url=`http://locationsng-api.herokuapp.com/api/v1/states/${this.state}/lgas`;
            axios.get(url)
                .then(res =>{
                    this.cities = res.data;
                })
                .catch(e=>{
                    console.log(e)
                })
        },
        find(){
                let searchData = {
                    value : this.value,
                    sector : this.sector,
                    location : this.state,
                    term : ''
                }
                this.$store.commit("setSearchData", searchData);
                this.$store.dispatch("search");
                this.$router.push('/search/result');
        },
        toggleToLogin(){
            this.$store.commit('toggleToLogin');
        }
    },
    created(){
        this.fetchState();
    }
}
</script>
<style scoped>
</style>
