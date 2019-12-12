<template>
    <div>
        <div class="main-container">
            <div class="head-section d-flex">
                <header class="d-flex">
                    <a href="#">Account</a>
                    <a href="#" class="menu"><i class="fa fa-home fa-1x"></i></a>
                </header>
            </div>
            <div class="body-section d-flex">
                <div class="logo">
                </div>
                <div class="search-form ">
                    <div class="search-input">
                        <span class="search-icon"></span>
                        <input type="text" name="" id="" v-model="term" />
                        <a-dropdown v-model="locationVisible">
                            <a class="ant-dropdown-link" href="#">
                            <span class="drop-icon"><i class="fa fa-map-marker"></i></span> </a>
                            <div slot="overlay">
                                <select class="form-control" v-model="location">
                                    <option value="All">All</option>
                                    <option value="Abuja">Abuja</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Zamfara">Zamfara</option>
                                </select>
                            </div>
                        </a-dropdown>
                        <a-dropdown v-model="sectorVisible">
                            <a class="ant-dropdown-link" href="#">
                            <span class="drop-icon"><i class=" ml-2 fa fa-tags"></i></span> </a>
                            <div slot="overlay">
                                <select class="form-control" v-model="sector">
                                    <option value="All">All</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Education">Education</option>
                                    <option value="Housing">Housing</option>
                                    <option value="Health">Health</option>
                                </select>
                            </div>
                        </a-dropdown>
                        <a-dropdown v-model="valueVisible" overlayClassName="value-range">
                            <a class="ant-dropdown-link" href="#">
                            <span class="drop-icon"><i class="fa font-700 ml-2">&#8358;</i></span> </a>
                            <div slot="overlay">
                                <a-slider range :step="1000" :defaultValue="[5000, 500000]" v-model="value" :min="1000" :max="1000000" />
                            </div>
                        </a-dropdown>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 text-center">
                            Location : <a-tag key="tagl" :closable="false">{{location}}</a-tag>
                            Sector : <a-tag key="tags" :closable="false">{{sector}}</a-tag>
                            Value : <a-tag key="tagv" :closable="false" v-html="`&#8358;${value[0]} - &#8358;${value[1]}`"></a-tag>
                        </div>
                    </div>
                    <div class="d-flex justify-center mt-3">
                        <button class="btn btn-secondary" @click="find">
                            Find Business
                             <span class="spinner-grow spinner-grow-sm" :class="{'d-none': !searching}" role="status" aria-hidden="true"></span>
                        </button>
                    </div>

                </div>
            </div>
            <div class="footer-section">
                <!-- <div class="footer-top d-flex align-center">
                    <span class="country">ISOURCE</span>
                </div> -->
                <div class="footer-bottom d-flex align-center justify-between">
                    <div>
                         <span class="country font-700">ISOURCE</span>
                        <span>Trainings</span>
                        <span>Executive Hub</span>
                        <span>About</span>
                    </div>
                    <div>
                        <span>Privacy</span>
                        <span>Sign in</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import Layout from "./Layout.vue";
export default {
    components: { Layout },
    data() {
        return {
            locationVisible: false,
            sectorVisible: false,
            valueVisible: false,
            value: [5000, 500000],
            sector: 'All',
            location: 'All',
            term: ''
        }
    },
    computed: {
        searching(){ return this.$store.state.searching }
    },
    methods: {
        handleChange(){},
        find(){
            if(this.term.length>0){
                let searchData = {
                    value : this.value,
                    sector : this.sector,
                    location : this.location,
                    term : this.term
                }
                this.$store.commit("setSearchData", searchData);
                this.$store.dispatch("search");
                this.$router.push('/search/result');
            }
        }
    }
}
</script>
<style scoped>
.drop-icon{
    color: #232848;
}
.justify-center{
    justify-content: center;
}
.justify-between{
    justify-content: space-between;
}
.mt-4{
   margin-top: 2rem;
}
.mt-3{
   margin-top: 1.5rem;
}
.align-center{
    align-items: center;
}
.btn{
    min-width: 40%;
    border-radius: 5em;
}
.main-container{
    width: 100vw;
    height: 100vh;
    overflow-x: hidden;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(/img/look.png);
}
.head-section{
    padding: 15px 30px;
    justify-content: flex-end;
}
.head-section>header{
    align-items: center;
}
header>a{
    padding-left: 15px;
    font-size: 13px;
}

header > a.avatar >img{
    width: 32px;
    height: 32px;
    border-radius: 50%;
}
header > a.menu{
    color: #00b8a5;
}
header > a.menu >img{
    width: 24px;
    height: auto;
    filter: opacity(0.6);
}
header > a.menu >img:hover{
    filter: opacity(0.9);
}

.body-section{
    height: 200px;
    width: 100%;
}
.footer-section{
    background-color: blanchedalmond;
    width: 100%;
}
a{
    text-decoration: none;
    color: rgba(0,0,0,0.87);
}
a:hover{
    opacity: .85;
    text-decoration: underline;
}
.body-section{
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.body-section >div.logo > img{
    height: 92px;
    width: 272px;
}
.search-form{
    justify-content: center;
}
.body-section >div.search-form{
    height: 118px;
    padding-top: 20px;
}
.search-input{
    width: 50vw;
    background: #fff;
    display: flex;
    border-radius: 8px;
    border: 1px solid #dfe1e5;
    box-shadow: none;
    border-radius: 24px;
    z-index: 3;
    height: 44px;
    margin: 0 auto;
    padding-left: 15px;
    padding-right: 15px;
    align-items: center;
}
.search-input input{
    width: 100%;
    height: 80%;
    border: 0;
    padding: 5px;
}
.search-input{
    box-shadow: 0 1px 6px 0 rgba(32,33,36,0.28);
    border-color: rgba(223,225,229,0);
}
.search-input input:focus{
    border: none;
    outline: none;
}
.search-icon{
    opacity: 0.5;
    background-image: url(/img/search.svg);
    width: 18px;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
}
.mic-icon{
    background-image: url(/img/mic.png);
    width: 24px;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}
.offered-lang > a{
    color: #1a0dab;
    margin-left: 10px;
    font-size: 13px;
}
.footer-section >div{
    height: 40px;
    background-color: #232848;
    border-top: 1px solid #141729;
    padding-left: 30px;
    padding-right: 30px;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.7);
}
.footer-bottom >div>span{
    font-size: 13px;
    margin-right: 15px;
    color: #929495;
    cursor: pointer;
}
.footer-bottom >div>span:hover{
    text-decoration: underline;
}
.footer-bottom >div>span:last-child{
    margin-right: 0;
}
</style>
