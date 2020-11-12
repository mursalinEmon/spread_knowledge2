<template>
    <div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create New Post</div>

                    <div class="card-body">
                        <form @submit.prevent="postBlog">
                            <div class="form-group">
                                <label for="blogTitle">Blog Title</label>
                                <input v-model="title" type="text" class="form-control" id="blogTitle" aria-describedby="emailHelp" placeholder="Title" required>

                            </div>


                            <div class="form-group">
                               <vue-editor v-model="content" />
                            </div>
                           <div class="form-group">
                               <div>
                                   <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                               </div>
                                <!-- <div v-else>
                                    <button type="submit" value="update" class="btn btn-primary">Update</button>
                                </div> -->

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
import { VueEditor } from "vue2-editor";


export default {
  components: { VueEditor },
  props:['post'],
  data: () => ({
    content: "",
    title:"",
    id: "",
    toggleButton: false,


  }),

  mounted(){
      this.editpost();
  },

  methods: {
      postBlog(){

          if(this.post == ""){
              this.toggleButton = true;

              axios.post('create-post', {
              title: this.title,
              content: this.content,

          }).then((res)=>{
              console.log(res);
              this.title="";
              this.content="";
              this.$alert(
              res.data.message,
              "",
              "success"
            )}).catch()
          }
          else{
              axios.post('update-post', {
              title: this.title,
              content: this.content,
              id: this.id

          }).then((res)=>{
              console.log(res);
              this.title="";
              this.content="";
              this.$alert(
              res.data.message,
              "",
              "success"
            )}).catch()
          }

      },


      editpost(){
          this.content=this.post.content;
          this.title=this.post.title;
          this.id=this.post.id;
          console.log(this.title);
      },


  }
};
</script>
