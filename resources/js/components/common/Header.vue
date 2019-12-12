<template>
  <div class="container">
        <section class="header row align-content-center h-80p">
          <header class="col-md-12 d-flex justify-content-between align-self-center align-items-center">
                <a href="/" class="logo-text">
                    iSource
                </a>
                <ul class="d-flex justify-self-end mb-0">
                    <li class="align-self-center text-primary-light mr-2 d-flex align-items-center">
              <a href="/home" class="animate-link  mr-1 justify-self-center text-dark text-uppercase  pr-3">Businesses</a>
              <a href="/search" class="animate-link  mr-1 justify-self-center text-dark text-uppercase  pr-3">Search</a>
              <a href="/home" class="animate-link  mr-1 justify-self-center text-dark text-uppercase pr-3">Profile</a>
              <a href="/home" class="animate-link  mr-1 justify-self-center text-dark text-uppercase " @click="logout">Logout</a>
              </li>
              </ul>
            </header>
        </section>
  </div>

</template>
<script>
export default {
    methods:{
        logout(){
            axios.post('/logout')
                .then(response=>{
                    window.location.pathname = '/';
                })
                .catch(console.log);
        }
    }
}
</script>
<style scoped>
</style>
