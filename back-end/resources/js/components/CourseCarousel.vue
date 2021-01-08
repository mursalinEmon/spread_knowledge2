<template>
<div class="container">

    <carousel :autoplay="true" :nav="false" :responsive="{1000:{items:1}}" :items="1" :mouseDrag="false" :loop="true">

        <div v-for="(course,index) in top_courses" :key="index" >
            <h6>{{course.course_title}}</h6>

        </div>
    </carousel>
</div>
</template>

<script>

import carousel from 'vue-owl-carousel'
import ExampleComponent from './ExampleComponent.vue';
export default {
 components:{
     carousel,
 },
 props:{

 },
 data:()=>({
     top_courses:[],

 }),
 created(){
     this.fetch_Top_Courses();
 },
methods:{
    fetch_Top_Courses(){
        axios.get('/top-course').then((res)=>{
            console.log(res);
            this.top_courses=res.data.top_courses;
            }).catch((err)=>{console.log(err);})
    }
}

}
</script>

<style>

</style>
