<template>
    <div>
        <div>
        <div>
            <div>
                <div>
                    <div class="card-body">
                        <form @submit.prevent="postTopic">
                            <div class="form-group">
                                <label for="topicTitle">Topic Title</label>
                                <input v-model="title" type="text" class="form-control" id="topicTitle" aria-describedby="emailHelp" placeholder="Title" required>

                            </div>


                            <div class="form-group">
                                <label for="">Content</label>
                               <vue-editor v-model="content" />
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
    props:[{

    }],
     created(){
        this.course_id=this.$attrs.course_id;
    },
    data:()=>({
        title:"",
        content:"",
        course_id:null,
    }),

    methods:{
        postTopic(){
             let formData = new FormData();
             if( this.course_id){
                    formData.append('course_id', this.course_id);
                    formData.append('topic_title', this.title);
                    formData.append('topic_body', this.content);

                    axios.post('/create-course-topic',formData).then((res)=>{
                        this.title="";
                        this.content="";
                         this.$alert(
                                res.data.message,
                                "",
                                "success"
                                )
                    }).catch((err)=>{console.log(err)});
             }

        },
    },
}
</script>
<style lang="scss" scoped>

</style>
