<template>
<div class="container">

   <hooper :itemsToShow="3" :centerMode="true" pagination="no">

         <slide v-for="(course,index) in top_courses" :key="index" :index="index" >
            <h6>{{course.course_title}}</h6>

         </slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
  </hooper>
</div>
</template>

<script>

import { Hooper, Slide, Navigation as HooperNavigation } from 'hooper';
import 'hooper/dist/hooper.css';
export default {
 components:{
        Hooper,
        Slide,
        HooperNavigation
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
