<template>
  <div>
      <Layout>
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Add new business</h4>
                    <div class="card">
                        <div class="card-body">
                            <span>
                                Creating a good business on the platform gives you the opportunity to have your business information
                                verified and get paid for it while start ups can access such information at an affordable price.
                                Also the platform allows individuals (Workers/retirees/Nigeria in diaspora) to become investors, if you go for the invesment option.
                            </span>
                        </div>
                    </div>
                    <div class="form mt-4">
                        <form action="#">
                            <div class="form-group">
                                <ImageFile v-model="form.cover" :placeholder="'Select Business Cover'"
                                :name="'Business Cover'" key="businessCover"/>
                                <div class=" help-block invalid-feedback d-block" >{{imageValidateFail}}</div>
                                <small id="coverHelpBlock" class="form-text text-muted">
                                    Using a good and descriptive image gives your business a good visual impression.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="title">Business TItle</label>
                                <input id="title" type="text" class="form-control"
                                v-model="form.title" required :class="{ 'is-invalid': form.errors.has('title') }">
                                <has-error :form="form" field="title"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="desctiption">Business Description</label>
                                <textarea id="description" class="form-control" v-model="form.description"
                                required :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                <has-error :form="form" field="description"></has-error>
                            </div>
                             <div class="form-group">
                                <label for="value_proposition">Value Proposition</label>
                                <textarea id="value_proposition" class="form-control" v-model="form.value_proposition"
                                required :class="{ 'is-invalid': form.errors.has('value_proposiition') }"></textarea>
                                <has-error :form="form" field="value_proposition"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="customer_segment">Customer Segment</label>
                                <textarea id="customer_segment" class="form-control" v-model="form.customer_segment"
                                required :class="{ 'is-invalid': form.errors.has('customer_segment') }"></textarea>
                                <has-error :form="form" field="customer_segment"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="key_resources">Key Resources (separated by comma)</label>
                                <textarea id="key_resources" class="form-control" v-model="form.key_resources"
                                required :class="{ 'is-invalid': form.errors.has('key_resources') }"></textarea>
                                <has-error :form="form" field="key_resources"></has-error>
                            </div>
                            <div class="form-group">
                                <ImageFile v-model="form.document" :placeholder="'Select Business Document'"
                                :supportedFormat="fileFormat" :name="'Business Document'" key="businessDocument"/>
                                <div class=" help-block invalid-feedback d-block" >{{documentValidateFail}}</div>
                                <!-- <small id="coverHelpBlock" class="form-text text-muted">
                                    Using a good and descriptive image gives your business a good visual impression.
                                </small> -->
                            </div>
                            <div class="form-group row justify-content-evenly mt-1">
                                <div class="">
                                    <label for="funding">Seeking funding/Investment</label>
                                    <input id="funding" type="radio" value="investment" name="type" v-model="form.type" @change="updateValueText">
                                </div>
                                <div class="">
                                    <label for="mentorship">Information Sale</label>
                                    <input id="mentorship" type="radio" value="sale" name="type" v-model="form.type" @change="updateValueText">
                                </div>
                                <has-error :form="form" field="type"></has-error>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="value">Value (Naira) - {{valueText}}</label>
                                    <input id="value" type="number" class="form-control" v-model="form.value"
                                    required :class="{ 'is-invalid': form.errors.has('value') }">
                                    <has-error :form="form" field="value"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="location">Business Location</label>
                                        <select name="location" id="location" class="form-control"
                                        v-model="form.location" required :class="{ 'is-invalid': form.errors.has('location') }">
                                            <option value="Abuja">Abuja</option>
                                            <option value="Anambra">Anambra</option>
                                            <option value="Akwa Ibom">Akwa Ibom</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Osun">Osun</option>
                                            <option value="Zamfara">Zamfara</option>
                                        </select>
                                        <has-error :form="form" field="location"></has-error>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sector">Business Sector</label>
                                        <select name="sector" id="location" class="form-control"
                                        v-model="form.sector" required :class="{ 'is-invalid': form.errors.has('sector') }">
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Technology">Technology</option>
                                            <option value="Education">Education</option>
                                            <option value="Housing">Housing</option>
                                            <option value="Health">Health</option>
                                        </select>
                                        <has-error :form="form" field="sector"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <button @click.prevent="addBusiness" class="btn btn-primary w-100 btn-lg" type="submit" :disabled="formDisabled">
                                        SUBMIT NEW BUSINESS
                                    <span class="spinner-grow spinner-grow-sm" :class="{'d-none': !formDisabled}" role="status" aria-hidden="true"></span>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </Layout>
  </div>

</template>
<script>
import Layout from "./Layout"
import mixins from "../../mixins";
import ImageFile from "../common/ImageFile"
export default {
    mixins: [mixins],
    components: { Layout, ImageFile },
    data(){
        return {
            valueText:' Fund Seeking to raise ',
            imageValidateFail:'',
            documentValidateFail:'',
            fileFormat: ['application/pdf'],
            formDisabled : false
            }
    },
    computed:{
        form() {
            return new Form({
                'value_proposition': '',
                'title' : '',
                'description' : '',
                'customer_segment' : '',
                'key_resources' : '',
                'type' : 'investment',
                'value' : '',
                'sector' : '',
                'location' : '',
                'cover' : [],
                'document' : []
        })},
    },
    methods: {
        updateValueText(){
            this.valueText = (this.form.type == 'investment')
                    ?' Fund Seeking to raise '
                    :' Information worth - our finance team would evaluate  '
        },
        addBusiness(){
            if(this.form.cover === ''){
                this.imageValidateFail= 'Cover is required';
                return true;
            }
            if(this.form.document === ''){
                this.documentValidateFail = 'Business document is required';
                return true;
            }
            this.documentValidateFail = '';
            this.imageValidateFail = '';
            NProgress.start();
            this.formDisabled = true;
            this.form.post('/api/business')
                .then(response => {
                    this.notify("Business successfully added");
                    this.$router.push('/businessOwner')
                })
                .catch(err => {
                    this.notify("error adding business", "error");
                }).finally(e =>{
                    NProgress.done();
                    this.formDisabled = false;
                });
        }
    }
}
</script>
<style scoped>
.justify-content-evenly{
    justify-content: space-evenly;
}
</style>
