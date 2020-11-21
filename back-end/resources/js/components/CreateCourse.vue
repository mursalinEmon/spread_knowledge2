<template>
<div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create New Course</div>

                    <div class="card-body">
                        <form @submit.prevent="submitFile()">
                            <div class="form-group">
                                <label for="blogTitle">Course Title</label>
                                <input v-model="title" type="text" class="form-control" id="blogTitle" aria-describedby="emailHelp" placeholder="Title" required>

                            </div>
                            <div class="form-group">
                                  <label  >Upload Course Banner <small>(Recomended: 13:6 ratio)</small></label><br>

                                    <div class="d-flex justify-content-center">
                                         <label for="image" class="btn btn-primary form-group" id="selector" style="cursor: pointer;height:40px!important;">Select Image <i class="fas fa-image"></i></label>
                                         <input class="form-group form-control"  ref="file" type="file" @change="processFile(e)" style="opacty:1;position: absolute;z-index:-1;" id="image" name="file">
                                        <div :style="{ 'background-image': `url(${previewImage})` }" v-if="previewImage" class="imagePreviewWrapper">
                                            <span @click="removeImage" class="badge badge-secondary rounded float-right m-2">x</span>
                                        </div>
                                    </div>


                            </div>

                            <div class="form-group">
                                <label>Course Level</label>
                                <select class="form-group form-control" v-model="level" id="level" name="level">
                                    <option class="text-center" value="">Select</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="Advance">Advance</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="">Tags</label>
                                <div class="d-flex">
                                     <div class="">
                                        <vue-bootstrap-typeahead  v-model="query"  :data="fetchedTags"/>
                                    </div>

                                    <div class="ml-auto">
                                        <input value="Add" readonly @click="addTags" class="btn btn-primary ">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button @click="deleteBadge(index)" class="btn btn-secondary ml-2 p-2" v-for="(tag,index) in tags" :key="index">{{ tag }} <span class="badge badge-light crossButton">x</span></button>
                            </div>



                           <div class="form-group">
                               <div>
                                   <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                               </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>


<script>


export default {

    data:()=>({
        file:"",
        title:"",
        id: "",
        level:"",
        toggleButton: false,
        query:"",
        fetchedTags:[],
        tags:[],
        previewImage: null,
    }),
    watch:{

    },
    methods:{
        processFile(e){
           this.file = this.$refs.file.files[0];
            let reader = new FileReader
          reader.onload = e => {
              e.preventDefault();
            this.previewImage = e.target.result;
            console.log("ok");
          }
          reader.readAsDataURL(this.file);
            this.$alert(
              "Image Uploaded",
              "",
              "success"
            )
        },
        submitFile(){
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('title', this.title);
            formData.append('tags', this.tags);
            formData.append('level', this.level);

            axios.post( '/course-create',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then((res)=>{

              this.title="";
              this.level="";
              this.tags=[];
              this.file="";
              this.$alert(
              res.data.message,
              "",
              "success"
            )}).catch();
        },

        async fetchTags(){
          await axios.get('fetch-tags').then((res)=>{
              this.fetchedTags=res.data.tags;
          }).catch()
      },

      addTags(){
          this.tags.push(this.query);
          this.query="";
      },

      deleteBadge(index){
          this.tags.splice(index,1);
      },

      removeImage(){
          this.previewImage = null;


      },
    },
}
</script>

<style scoped lang="scss">
.imagePreviewWrapper {
    width: 150px;
    height: 150px;
    display: block;
    cursor: pointer;
    margin: 0 auto 30px;
    background-size: cover;
    background-position: center center;
}
</style>
