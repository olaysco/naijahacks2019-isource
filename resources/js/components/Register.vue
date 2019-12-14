<template>
  <div>
      <div class="container">
            <section class="header row align-content-center h-80p">
                <header class="col-md-12 d-flex justify-content-between align-self-center align-items-center">
                        <a href="/" class="logo-text">
                            iSource
                        </a>
                        <ul class="d-flex justify-self-end mb-0">
                            <li class="align-self-center text-primary-light mr-2 d-flex align-items-center">
                        <a href="/home" class="animate-link  mr-1 justify-self-center text-dark  pr-3">HOME</a>
                        <router-link to="/search" class="animate-link  mr-1 justify-self-center text-dark  pr-3">SEARCH</router-link>
                    <a href="/invest" class="animate-link  mr-1 justify-self-center text-dark pr-3">INVESTMENT</a>
                    <a href="/login" class=" btn btn-secondary  mr-1 justify-self-center">SIGN IN</a>
                    </li>
                    </ul>
                </header>
            </section>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card br-8 bs-light border-0" id="login">
                        <div class="card-header br-8 border-0 bg-white">
                            <h4 class="text-center py-2">SIGN UP</h4>
                        </div>

                            <div class="card-body">
                            <form method="POST" action="/register" aria-label="Login">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label for="name" class="text-dark">Full Name</label>
                                    <input id="name" type="text" class="form-control" name="name" v-model="form.name" placeholder="Enter Name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"  required autofocus>
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="email" class="text-dark">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" v-model="form.email" placeholder="Enter Email"
                                        :class="{ 'is-invalid': form.errors.has('email') }"  required>
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="password" class="text-dark">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" v-model="form.password" placeholder="Enter Password"
                                    :class="{ 'is-invalid': form.errors.has('password') }" required>
                                    <has-error :form="form" field="password"></has-error>

                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password" class="text-dark">Re-Type Password</label>
                                    <input id="password" type="password" class="form-control" name="password" v-model="form.password_confirmation" placeholder="Enter Password"
                                    :class="{ 'is-invalid': form.errors.has('password_confirmation') }" required>
                                    <has-error :form="form" field="password_confirmation"></has-error>

                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="type" class="text-dark">Investor</label>
                                    <input id="type" type="radio" name="type" v-model="form.type"
                                    :class="{ 'is-invalid': form.errors.has('type') }" value="investor" required>
                                    <has-error :form="form" field="type"></has-error>
                                    <label for="type" class="text-dark">Business</label>
                                    <input id="type" type="radio" name="type" v-model="form.type"
                                    :class="{ 'is-invalid': form.errors.has('type') }" value="business" required>
                                    <has-error :form="form" field="type"></has-error>

                                </div>
                                </div>

                                <div class="form-group row mb-2">
                                <div class="col-md-12 ">
                                    <button @click.prevent="register" type="submit" class="btn btn-primary w-100" :disabled="form.busy">
                                    Register
                                    <span class="spinner-grow spinner-grow-sm" :class="{'d-none': !form.busy}" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                                </div>

                                <!-- <div class="form-group row mb-2 mt-1">
                                <div class="col-md-12 col-lg-6 mb-2">
                                    <a  href="/google/redirect" class="btn btn-google w-100 text-white">
                                    Login with <i class="fab fa-google"></i>
                                    </a>
                                </div>
                                <div class="col-md-12 col-lg-6 ">
                                    <a href="/github/redirect" class="btn btn-github w-100 text-white">
                                    Login with <i class="fab fa-github"></i>
                                    </a>
                                </div>
                                </div> -->

                                <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    <router-link class=" ml-1 bs-light p-1" to="/login" >Existing user?</router-link>
                                </div>
                                </div>

                            </form>
                            </div>
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
                name: '',
                password_confirmation : '',
                remember: false,
                type:"business",
            })
        }
    },
    methods: {
        register(){
            this.form.post('/register')
                .then((response)=>{
                    window.location.pathname = '/home';
                }).catch((err)=>{
                    console.log(err);
                })
        },
        toggleToLogin(){
            this.$store.commit('toggleToLogin');
        }
    }
}
</script>
<style scoped>
</style>
