<template>
  <div>
    <a
      href="#"
      class="user-dropdown dropdown-toggle"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      <img src="https://p.iconscoutmails.com/img/cf625b8.svg" class="d-flex user-details-thumb" />
    </a>
    <div class="dropdown-menu user-dropdown-menu" aria-labelledby="dropdownmenu">
      <a href="/dashboard" class="dropdown-item">My Dashboard</a>
      <hr />
      <a @click.prevent="logout" class="dropdown-item">Logout</a>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  methods: {
    ...mapActions(["logout"])
  }
};
</script>
<style scoped>
.dropdown-toggle.user-dropdown::after {
  content: unset;
}
.user-dropdown-menu {
  position: absolute;
  will-change: unset !important;
  top: unset !important;
  left: unset !important;
  transform: unset !important;
  right: 1em !important;
  box-shadow: 0 10px 20px 0 rgba(22, 26, 33, 0.1);
  border: 1px solid transparent;
}
</style>
