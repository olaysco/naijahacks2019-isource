<template>
  <div>
    <div class="container-fluid pr-0 head-container">
      <section class="header row align-content-center h-80p mx-3">
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
              <a v-else href="/login" class="btn btn-secondary justify-self-center">sign in</a>
            </li>
          </ul>
        </header>
      </section>
    </div>
    <section class="main">
      <div class="container d-flex flex-column justify-content-center h-100">
        <div class="row">
          <div class="col-md-8 d-flex flex-column justify-content-center heading-text">
            <h2 class="text">
              Breaking the
              <span class="barrier text-line-through">barrier</span>
              between business
              <span class="font-bold">start-up information</span>
              and
              <span class="font-bold">individuals</span>
            </h2>
            <!-- <div>
                            <router-link to="/search" class="btn btn-secondary px-4">FIND BUSINESS NOW</router-link>
            </div>-->
          </div>
          <div class="col-md-4">
            <SearchComponent></SearchComponent>
            <!-- <login v-if="toLogin"></login>
            <Register v-else></Register>-->
          </div>
        </div>
      </div>
    </section>
    <section class="ventures">
      <div class="container">
        <div class="row">
          <div class="col-md-12 py-4">
            <h3 class="text-center text-uppercase">Featured Businesses</h3>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-4">
            <BusinessCard></BusinessCard>
          </div>
          <div class="col-md-4">
            <BusinessCard></BusinessCard>
          </div>
          <div class="col-md-4">
            <BusinessCard></BusinessCard>
          </div>
        </div>-->
        <!-- <div class="row my-4">
          <div class="col-md-12 d-flex justify-content-center my-4">
            <router-link to="/search" class="btn btn-secondary w-60 py-3">FIND A BUSINESS NOW</router-link>
          </div>
        </div>-->
      </div>
    </section>
    <!-- <section class="sponsors">
      <div class="container">
        <div class="row">
          <div class="col-md-12 py-4">
            <h3 class="text-center text-uppercase">Our Gold Sponsors</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-center">
            <img src="/img/nj.jpeg" alt="naija-hacks" class="img-responsive w-300p" />
          </div>
        </div>
      </div>
    </section>-->
    <section class="footer">
      <Footer></Footer>
    </section>
  </div>
</template>
<script>
import Footer from "./Footer";
import Register from "./Register";
import login from "./Login";
import BusinessCard from "./common/BusinessCard";
import SearchComponent from "./common/SearchComponent";
import UserDropdown from "./common/UserDropdown";
export default {
  components: {
    login,
    BusinessCard,
    Footer,
    Register,
    SearchComponent,
    UserDropdown
  },
  data() {
    return {};
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    toLogin() {
      return this.$store.state.toLogin;
    }
  },
  methods: {
    toggleToLogin() {
      this.$store.commit("toggleToLogin");
    }
  }
};
</script>
<style scoped>
.w-60 {
  min-width: 55%;
}
.heading-text .text {
  font-size: 3rem;
  text-align: left;
}
.main {
  height: calc(100vh - 80px);
  width: 100vw;
  background-color: #fff;
}
.nav-link {
  color: #000;
  font-weight: 400;
}
.heading-text .barrier {
  font-size: 80%;
}
section.ventures {
  min-height: 97vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
section.sponsors {
  min-height: 70vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.sponsors h3 {
  font-size: 42px;
  background: rgb(43, 37, 1);
  background: linear-gradient(
    90deg,
    rgba(43, 37, 1, 0.9224732129179797) 0%,
    rgba(187, 159, 0, 1) 15%,
    rgba(29, 25, 1, 0.9252743333661589) 89%
  );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>
