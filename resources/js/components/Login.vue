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
                <a href="/register" class=" btn btn-secondary  mr-1 justify-self-center">SIGN UP</a>
                </li>
                </ul>
                </header>
            </section>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card br-8 bs-light border-0" id="login">
                        <div class="card-header br-8 border-0 bg-white">
                            <h4 class="text-center py-2">SIGN IN</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/login" aria-label="Login">
                                <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="text-dark">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" v-model="form.email" placeholder="Enter Email"
                                    :class="{ 'is-invalid': form.errors.has('email') }"  required autofocus>
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

                                <div class="form-group row mb-2">
                                <div class="col-md-12 ">
                                    <button @click.prevent="login" type="submit" class="btn btn-primary w-100" :disabled="form.busy">
                                    Login
                                    <span class="spinner-grow spinner-grow-sm" :class="{'d-none': !form.busy}" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                                </div>

                                <div class="form-group row mt-1">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="form.remember">

                                    <label class="form-check-label" for="remember">
                                        Remember
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <a class="btn btn-link forgot-link" href="/password/reset">
                                    Forgot Password
                                    </a>
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
                                    <router-link class=" ml-1 bs-light p-1" to="/register" >New User? Create Account</router-link>
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
                remember: false
            })
        }
    },
    methods: {
        login(){
            this.form.post('/login')
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
