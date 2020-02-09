<template>
  <div class="container-fluid pr-0 head-container">
    <section class="header row align-content-center h-80p mx-3">
      <header
        class="col-md-12 d-flex justify-content-between align-self-center align-items-center navbar-expand-lg"
      >
        <a href="/" class="logo-text">
          <img src="/img/logo-mini.svg" alt="isource-logo" width="40" />
          iSource
        </a>
        <button
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
          class="navbar-toggler"
        >
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div id="navbarSupportedContent" class="navbar-collapse collapse offset" style>
          <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item">
              <a href="/home" class="nav-link active animate-lin justify-self-center pr-3">Home</a>
            </li>
            <li class="nav-item">
              <router-link to="/search" class="nav-link animate-ink justify-self-center pr-3">Search</router-link>
            </li>
            <li class="nav-item">
              <a href="/invest" class="nav-link animate-ink justify-self-center pr-3">Investment</a>
            </li>
            <hr />
            <li v-if="user && user.email" class="nav-item">
              <a href="/dashboard" class="dropdown-item">My Dashboard</a>
            </li>
            <li v-if="user && user.email" class="nav-item">
              <a href="#" class="dropdown-item">Logout</a>
            </li>
            <li v-else class="nav-item">
              <a href="/login" class="btn btn-secondary justify-self-center">sign in</a>
            </li>
          </ul>
        </div>
        <ul class="justify-self-end mb-0 d-sm-none d-md-none d-lg-flex d-none">
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
</template>
<script>
import UserDropdown from "../common/UserDropdown";
export default {
  components: {
    UserDropdown
  },
  computed: {
    user() {
      return this.$store.state.user;
    }
  },
  methods: {
    logout() {
      axios
        .post("/logout")
        .then(response => {
          window.location.pathname = "/";
        })
        .catch(console.log);
    }
  }
};
</script>
<style scoped>
</style>
