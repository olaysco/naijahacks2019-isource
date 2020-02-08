<template>
  <div class="d-flex min-height-100vh flex-column">
    <section class="header">
      <Header></Header>
    </section>
    <section class="main container pt-6 pb-6">
      <div class="row">
        <div class="col-lg-3">
          <aside class="dashboard-menu card mb-2">
            <router-link to="/dashboard/1" class="user-details">
              <div class="media">
                <img
                  src="https://p.iconscoutmails.com/img/cf625b8.svg"
                  class="d-flex user-details-thumb"
                />
                <div class="media-body">
                  <h6 class="user-details-name">Olayiwola Odunsi</h6>
                  <span class="user-details-email">olayiwolaodunsi@gmail.com</span>
                </div>
              </div>
            </router-link>
            <hr class="mt-0" />
            <ul class="list-unstyled menu-options">
              <li>
                <router-link to="/businessOwner/businesses">
                  <i class="far fa-lightbulb mr-2"></i>
                  <span class="text">Businesses</span>
                </router-link>
              </li>
              <li>
                <router-link to="/businessOwner/businesses">
                  <i class="far fa-file-alt mr-2"></i>
                  <span class="text">Transactions</span>
                </router-link>
              </li>
              <li>
                <router-link to="/businessOwner/businesses">
                  <i class="far fa-money-bill-alt mr-2"></i>
                  <span class="text">Account Balance</span>
                </router-link>
              </li>
              <li>
                <router-link to="/businessOwner/businesses">
                  <i class="far fa-user-circle mr-2"></i>
                  <span class="text">Profile Setting</span>
                </router-link>
              </li>
              <hr width="85%" class="mx-auto" />
            </ul>
          </aside>
        </div>
        <div class="col-lg-9">
          <slot></slot>
        </div>
      </div>
    </section>
    <section class="footer mt-auto">
      <Footer></Footer>
    </section>
  </div>
</template>
<script>
import Footer from "../common/Footer.vue";
import Header from "../common/Header";
import AllBusiness from "../common/AllBusiness";
export default {
  components: {
    Header,
    AllBusiness,
    Footer
  }
};
</script>
<style scoped>
.min-height-100vh {
  min-height: 100vh;
}
</style>
