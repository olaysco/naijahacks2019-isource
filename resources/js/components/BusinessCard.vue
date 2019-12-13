<template>
  <div>
      <router-link :to="`/business/${index}`">
      <div class="project-card bs-light br-4 position-relative">
        <div class="up">
          <figure>
            <img :src="'/storage'+business.cover_url" alt="" srcset="" class=" img-responsive">
            <div class="value ">
              <!-- <div  class="day d-flex"><span class="m-auto">{{project.startDate | moment('Do')}}</span></div> -->
              <!-- <span class="month">{{project.startDate | moment('MMM')}}</span> -->
              <span v-text="(business.type == 'investment')?'funding':'sale'"></span>: &#8358;{{business.value}}
            </div>
          </figure>
        </div>
        <div class="down position-relative">
          <div class="pm-info">
            <img src="/img/avatar.png" alt="" class="pm-img">
            <span class="pm-name">{{business.business_owner.user.name}}</span>
          </div>
          <div class="wrap pt-4 px-4 ">
            <h5 class="d-block text-line-2 text-uppercase mt-2" v-text="business.title">
              <!-- <small><i class="fa fa-check-circle"></i></small> -->
            </h5>
            <span class="d-block text-line-2" v-text="business.description"> </span>
          </div>
          <div class="position-absolute w-100 pt-4 px-4 pb-0 foot">
              <div class="row py-2 category d-flex justify-content-between">
                    <span class="mr-2"><i class="fa fa-fw fa-tag"></i> {{business.sector}}</span>
                    <span><i class="fa fa-fw fa-map-marker"></i> {{business.location}} </span>
              </div>
          </div>
        </div>
      </div>
      </router-link>
  </div>

</template>
<script>
export default {
    props:{
        business:{
            required: true
        },
        index:{
            required: true
        }
    }
}
</script>
<style scoped>
.category span{
    font-weight: 100;
    color: rgba(60, 60, 60, 0.43);
}
</style>
