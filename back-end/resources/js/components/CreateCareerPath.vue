<template>
  <div class="container">
       <form class="card-body" @submit.prevent="submitFile()">
                            <div class="form-group">
                                <label for="blogTitle">Path Title</label>
                                <input v-model="title" type="text" class="form-control" id="blogTitle" aria-describedby="emailHelp" placeholder="Title" required>

                            </div>
                            <div class="form-group">
                                  <label  >Upload Path Banner <small>(Recomended: 13:6 ratio)</small></label><br>

                                    <div class="d-flex justify-content-center">
                                         <label for="image" class="btn btn-primary form-group" id="selector" style="cursor: pointer;height:40px!important;">Select Image <i class="fas fa-image"></i></label>
                                         <input class="form-group form-control"  ref="file" type="file" @change="processFile()" style="opacty:1;position: absolute;z-index:-1;" id="image" name="file">
                                            <div :style="{ 'background-image': `url(${previewImage})`,'height':'30vh','width':'30vw'}" v-if="previewImage" class="imagePreviewWrapper">
                                                <span @click="removeImage" class="badge badge-secondary rounded float-right m-2">x</span>
                                            </div>
                                    </div>


                            </div>

                            <div class="form-group">
                                <label for="blogTitle">Path Description</label>
                                <textarea v-model="description" type="text" class="form-control" id="blogTitle" rows="3" placeholder="Put Description.." required></textarea>

                            </div>

                            <!-- <div class="form-group">
                                <label>Course Category</label>
                                <select class="form-group form-control" v-model="category" id="level" name="level">
                                    <option class="text-center"  value="">Select</option>
                                    <option v-for="(category, index) in categories"  :key="index" >{{ category.id  }}.{{ category.name  }}</option>
                                </select>
                            </div> -->

                           <div class="form-group">
                               <div>
                                   <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                               </div>

                            </div>

                        </form>
  </div>
</template>

<script>
export default {
    data:()=>(
        {
            file:"",
            description:"",
            previewImage: null,
        }
    ),
    methods:{
      processFile(){
           this.file = this.$refs.file.files[0];
            let reader = new FileReader
          reader.onload = e => {

            this.previewImage = e.target.result;

          }
          reader.readAsDataURL(this.file);
            this.$alert(
              "Image Uploaded",
              "",
              "success"
            )
        },
         removeImage(){
        this.previewImage = null;
        this.file=null;
        this.$refs.file.value="";
      },
    }
}
</script>

<style>

</style>
