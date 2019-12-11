<template>
  <div>
    <h5 class="status" id="imageLoading">{{status}}</h5>
    <slot :clickUpload="clickUploadInput">
    <button class="btn btn-secondary-inverse w-100" @click="clickUploadInput()"> 
      <i class="fa fa-file mr-4"></i>
      {{holderText}}
    </button>
    </slot>
     <input type="file" class="custom-file-input passport-upload hidden position-absolute" name="image" 
     :id="this.$vnode.key"  @change="uploadImage($event.target)">
  </div>
</template>

<script scoped>
export default {
  props: {
    value: {
      required : true,
    },
    showDesc : {
      default : function(){
        return true
      },
      type : Boolean,
    },
    placeholder : {
      required : true,
    },
    name : {
      required : true
    },
    supportedFormat : {
      default : function(){
        return ["image/jpeg", "image/jpg", "image/png"]
      },
      type : Array,
    },
    maxFileSize : {
      default : function(){
        return 1
      },
      type : Number
    }
  },
  model:{
    event:`modified`
  },
  data: function(){
    return{
      holderText: this.placeholder,
      status:'',
    }
  },
  methods: {
    clickUploadInput: function(){
      document.getElementById(`${this.$vnode.key}`).click();

    },
    uploadImage: function(event){
      let supportedFormat = this.supportedFormat;
        let image = event.files[0];
        let vm = this;
        console.log(image.type);
        if(image.size > this.maxFileSize * 1024 * 1024){
          vm.status = `max file size is ${this.maxFileSize}mb`;
          return;
        }
        if (supportedFormat.includes(image.type)){
            this.status = 'processing upload...';
            let reader = new FileReader();
            reader.onloadend = function(){
                let newImage = {'name':vm.name,'data':reader.result,'type':image.type, 'size':image.size, 'fileName':image.name};
                if(vm.showDesc){
                   vm.status = '';
                  vm.holderText = image.name
                }else{
                  vm.status = '';
                }
                vm.changeValue(newImage);
            }
            reader.readAsDataURL(image);
        }else{
            vm.status = "invalid file only "+supportedFormat.join();
        }
    },
    changeValue: function(newVal) {
      this.$emit("modified", newVal);
    }
  }
};
</script>
<style  scoped>
  .custom-file-input{
    top: -99999px;
    
  }
</style>
