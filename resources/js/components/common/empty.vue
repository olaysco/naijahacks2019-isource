<template>
  <div class="row d-block py-4">
      <div class="col d-flex place-center">
          <img src="/img/empty.png" alt="empty list" class="empty-img" >
      </div>
      <div class="col-md-12 text-center opacity-mid mb-4">
          <span>VACUO</span>
      </div>
  </div>

</template>
<script>
export default {

}
</script>
<style scoped>
.empty-img{
    margin-top: 3rem;
    max-width: 50%;
}
.place-center{
    place-content: center
}
.opacity-mid{
    opacity: 0.8;
    color: #eee;
    letter-spacing: 8.5px;
}
</style>
