<template>
  <div class="auth-main">
    <div class="container auth-container">
      <!-- <section class="header row align-content-center h-80p mx-3">
        <header
          class="col-md-12 d-flex justify-content-between align-self-center align-items-center"
        >
          <a href="/" class="logo-text">
            <img src="/img/logo-mini.svg" alt="isource-logo" width="40" />
            iSource
          </a>
          <ul class="d-flex justify-self-end mb-0">
            <li class="align-self-center text-primary-light d-flex align-items-center">
              <a href="/home" class="nav-link active animate-lin justify-self-center pr-3">Home</a>
              <router-link to="/search" class="nav-link animate-ink justify-self-center pr-3">Search</router-link>
              <a href="/invest" class="nav-link animate-ink justify-self-center pr-3">Investment</a>
              <UserDropdown v-if="user && user.email"></UserDropdown>
              <a v-else href="/register" class="btn btn-secondary justify-self-center">Register</a>
            </li>
          </ul>
        </header>
      </section>-->
      <div class="row justify-content-center my-auto">
        <div class="col-md-5 col-sm-12">
          <div class="card br-8 bs-light border-0" id="login">
            <div class="logo-alpha">
              <a href="/" class="my-auto">
                <img src="/img/logo-mini-white.svg" alt="isource-logo" width="40" />
              </a>
            </div>

            <div class="card-header br-8 border-0 bg-white">
              <h4 class="text-center py-2">Welcome back, sign in to continue</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="/login" aria-label="Login">
                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="email"
                      type="email"
                      class="form-control"
                      name="email"
                      v-model="form.email"
                      placeholder="Enter Email"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                      required
                      autofocus
                    />
                    <has-error :form="form" field="email"></has-error>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="password"
                      type="password"
                      class="form-control"
                      name="password"
                      v-model="form.password"
                      placeholder="Enter Password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                      required
                    />
                    <has-error :form="form" field="password"></has-error>
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <div class="col-md-12">
                    <button
                      @click.prevent="login"
                      type="submit"
                      class="btn btn-primary w-100 btn-auth mb-2"
                      :disabled="form.busy"
                    >
                      Login
                      <span
                        class="spinner-grow spinner-grow-sm"
                        :class="{'d-none': !form.busy}"
                        role="status"
                        aria-hidden="true"
                      ></span>
                    </button>
                  </div>
                </div>

                <div class="form-group row mt-1">
                  <div class="col-md-12 col-lg-6">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        v-model="form.remember"
                      />

                      <label class="form-check-label" for="remember">Remember</label>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-6"></div>
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
                </div>-->
              </form>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12 text-center text-white">
              <router-link class="ml-1 p-1 text-white" to="/register">New User? Create Account</router-link>
            </div>
            <div class="col-md-12 text-center">
              <a class="btn btn-link forgot-link text-white" href="/password/reset">Forgot Password</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: new Form({
        email: "",
        password: "",
        remember: false
      })
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    }
  },
  methods: {
    login() {
      this.form
        .post("/login")
        .then(response => {
          window.location.pathname = "/home";
        })
        .catch(err => {
          console.log(err);
        });
    },
    toggleToLogin() {
      this.$store.commit("toggleToLogin");
    }
  }
};
</script>
<style scoped>
.auth-container {
  height: 100vh;
  display: flex;
  flex-direction: column;
}
.auth-main {
  background-color: #012e4d;
}
.logo-alpha {
  background-color: #01b8a5;
  margin-right: auto;
  margin-left: auto;
  padding: 0em 1em;
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
  margin-top: -47px;
  border-radius: 5em;
  display: flex;
  justify-content: center;
}
.btn-auth {
  box-shadow: -6px 6px 0px #01b8a5;
}
</style>
