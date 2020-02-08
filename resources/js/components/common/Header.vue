<template>
  <div class="container-fluid pr-0 head-container">
    <section class="header row align-content-center h-80p mx-3">
      <header class="col-md-12 d-flex justify-content-between align-self-center align-items-center">
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
</template>
<script>
export default {
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
