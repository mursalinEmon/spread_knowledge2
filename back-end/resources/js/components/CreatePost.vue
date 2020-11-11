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
                               <button  type="submit" class="btn btn-primary">Submit</button>
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
  data: () => ({
    content: "",
    title:"",
    id: "",

  }),

  methods: {
      postBlog(){
          console.log('hello')
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
      },


  }
};
</script>
