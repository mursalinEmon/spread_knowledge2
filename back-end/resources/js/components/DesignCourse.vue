<template>
<div>
    <div>
        <div>
        <div>
            <div>
                <div>
                    <div class="card-body">
                        <form @submit.prevent="createLesson">
                            <div class="form-group">
                                <label for="topicTitle">Lesson Title</label>
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
    <br>
    <div v-for="(lesson, index) in course_lessons"  :key="index" class="card w-75">
        <h5 class="card-title">{{ lesson.lesson_title }}</h5>
    </div>
</div>


</template>
<script>
export default {
    props:[{

    }],
     created(){
        this.course_id=this.$attrs.course_id;
        console.log(this.course_id);

    },
    data:()=>({
        title:"",
        content:"",
        course_id:null,
        fetched_lessons:"",
        course_lessons:[],
    }),

    methods:{
        createLesson(){
             let formData = new FormData();
             if( this.course_id){
                    formData.append('course_id', this.course_id);
                    formData.append('topic_title', this.title);
                    formData.append('topic_body', this.content);

                    axios.post('/create-course-lesson',formData).then((res)=>{
                        this.title="";
                        this.content="";
                        this.$alert(
                                res.data.message,
                                "",
                                "success"
                                )
                        this.showLessons();
                    }).catch((err)=>{console.log(err)});
             }

        },

         fetchLessons(){
            axios.get('/get-course-lessons').then((res)=>{
            this.fetched_lessons=res.data;

            }).catch((err)=>{console.log(err);});

        },

        showLessons(){
            axios.get(`/get-selected-course-lessons/${this.course_id}`).then((res)=>{
                console.log(res.data);
                this.course_lessons=res.data;

            }).catch((err)=>{console.log(err);});

        },
    },
}
</script>
<style lang="scss" scoped>

</style>
