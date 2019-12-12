<template>
<div>
    <section v-if="business">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
                <h3 class="businessName">{{business.title}} <small v-text="(business.type == 'investment')?'(funding)':'(sale)'"></small></h3>
                <div class="row py-2 category d-flex justify-content-between">
                            <span class="mr-2"><i class="fa fa-fw fa-tag"></i> {{business.sector}}</span>
                            <span><i class="fa fa-fw fa-map-marker"></i> {{business.location}}</span>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="business-cover">
                    <img :src="'/storage'+business.cover_url" alt="" srcset="" class=" img-responsive">
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-12 business-description br-4">
                <h6 class="p-4">
                    {{business.description}}
                </h6>
            </div>
        </div>
        <div class="row mb-4">
        <hr/>
        <div class="col-md-3">
            <div>
                <ul class="nav nav-tabs tabs-left sideways flex-column">
                    <li class="nav-item"><a class="nav-link active" href="#value" data-toggle="tab">Value Proposition</a></li>
                    <li class="nav-item"><a class="nav-link" href="#customer" data-toggle="tab">Customer Segment</a></li>
                    <li class="nav-item"><a class="nav-link" href="#resources" data-toggle="tab">Key resources</a></li>
                    <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab"> <i class="fa fa-lock"></i> Documents</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="value">
                    <h4>Value Proposition</h4>
                    <div class="list-group">
                        <span class="list-group-item" v-for="(pr,index) in business.value_proposition.split(',')" :key="index">
                            {{ pr }}</span>
                    </div>
                </div>
                <div class="tab-pane" id="customer">
                    <h4>Customer Segment</h4>
                    <span v-text="business.customer_segment"></span>
                </div>
                <div class="tab-pane" id="resources">
                    <h4>Key Resources</h4>
                    <span v-for="(pr,index) in business.key_resources.split(',')" :key="index+'kr'">Land <br></span>
                </div>
                <div class="tab-pane" id="documents">
                    <a :href="'/storage'+business.document_url" target="_blank" >Download document <i class="fa fa-file"></i></a>
                </div>
            </div>
            </div>
        </div>
    </section>
    <div class="row" v-else>
        <a-skeleton :loading="!business" />
    </div>
</div>

</template>
<script>
export default {
    props:{
        id:{ required: true }
    },
    computed:{
        business(){
            return this.$store.state.businesses[this.id];
        }
    }
}
</script>
<style scoped>
.business-cover{
    max-height: 400px;
    overflow: hidden;
}

.business-description{
    background-color: #232848;
    color: #fff;
}
.business-description h6{
    color: #fff;
}
.tabs-left {
  border-bottom: none;
  border-right: 1px solid #ddd;

}

.tabs-left>li {
  float: none;
 margin:0px;

}

.tabs-left>li>a.active,
.tabs-left>li>a.active:hover,
.tabs-left>li>a.active:focus {
    border-bottom-color: #ddd;
    border-right-color: transparent;
    background: #232848;
    border: none;
    border-radius: 0px;
    margin: 0px;
    color: #fff;
}
.nav-tabs>li>a:hover {
    /* margin-right: 2px; */
    line-height: 1.42857143;
    border: 1px solid transparent;
    /* border-radius: 4px 4px 0 0; */
}
.tabs-left>li>a.active::after{content: "";
    position: absolute;
    top: 10px;
    right: -10px;
    border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;

  border-left: 10px solid #232848;
    display: block;
    width: 0;}
</style>
