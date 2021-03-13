<template>
  <div class="container">
      <div v-if="reveal==false">
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



                           <div class="form-group">
                               <div>
                                   <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                               </div>

                            </div>

        </form>
        <br>
        <br>
        <div>
            <button v-if="next=='true'" @click="openSection()" class="btn btn-success float-right pr-4 mr-2">Next ></button>
        </div>
      </div>
      <div v-if="reveal==true">
           <div class="form-group">
                <label>Course Category</label>
                    <select class="form-group form-control" v-model="category" id="level" name="level">
                        <option class="text-center"  value="">Select</option>
                        <option v-for="(category, index) in categories"  :key="index" >{{ category.name  }}</option>
                    </select>
            </div>
      </div>
  </div>
</template>

<script>
export default {
    data:()=>(
        {
            file:"",
            description:"",
            previewImage: null,
            next:false,
            path_id:null,
            reveal:false,
            categories:null,
            category:"",


        }
    ),
    created(){
        this.fetch_category();
    },
     watch: {

        category: function (newCategory, oldCategory) {

            this.fetch_course( newCategory);
        }
    },
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
      submitFile(){

            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('title', this.title);
            formData.append('description', this.description);


            axios.post( '/careet-path-create',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then((res)=>{

              this.file="";
              this.previewImage = null;
              this.$alert(
              res.data.message,
              "",
              "success"
            );

            this.path_id=res.data.careetpath;
            if (res.data.careetpath ){
                   this.next='true';
            }

            }).catch();

        },

        fetch_category(){
            axios.get('/categories').then((res)=>{
                this.categories=res.data.categories;
            }).catch((err)=>(console.log(err)));
        },
        openSection(){
            this.reveal=true;
        },
        fetch_course(category){

           let cat_id = this.categories.filter((item)=>{
                if(item.name==category){
                console.log("gto");

                    return item.id

                }
            });
            // console.log(cat_id[0].id);
            axios.get(`/filtered-course/${cat_id[0].id}`).then((res)=>{
                console.log(res.data.f_courses);
            }).catch((err)=>(console.log(err)));
        },

    }
}
</script>

<style>

</style>
