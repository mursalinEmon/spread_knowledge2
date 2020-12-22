<template>
<div class="container">
    <form class="card-body" @submit.prevent="submitFile()">
                            <div class="form-group">
                                <label for="blogTitle">Course Title</label>
                                <input v-model="title" type="text" class="form-control" id="blogTitle" aria-describedby="emailHelp" placeholder="Title" required>

                            </div>
                            <div class="form-group">
                                  <label  >Upload Course Banner <small>(Recomended: 13:6 ratio)</small></label><br>

                                    <div class="d-flex justify-content-center">
                                         <label for="image" class="btn btn-primary form-group" id="selector" style="cursor: pointer;height:40px!important;">Select Image <i class="fas fa-image"></i></label>
                                         <input class="form-group form-control"  ref="file" type="file" @change="processFile()" style="opacty:1;position: absolute;z-index:-1;" id="image" name="file">
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

                            <div class="form-group">
                                <label>Course Category</label>
                                <select class="form-group form-control" v-model="category" id="level" name="level">
                                    <option class="text-center"  value="">Select</option>
                                    <option v-for="(category, index) in categories"  :key="index" >{{ category.id  }}.{{ category.name  }}</option>
                                </select>
                            </div>
                             <div v-if="category" class="form-group">
                                <label>Course Sub-Category</label>
                                <select class="form-group form-control" v-model="sub_category" id="level" name="level">
                                    <option class="text-center"  value="">Select</option>
                                    <option v-for="(category, index) in sub_categories"  :key="index" >{{ category.id  }}.{{ category.name  }}</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                        <label for="">Tags</label>
                                        <div class="d-flex">
                                            <div class="">
                                                <vue-bootstrap-typeahead  v-model="query" :data="fetchedTags"/>
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
</template>

<script>
export default {

props:{
    course:{
        type:Object,
        default:null
    }
},
created(){
    this.title=this.course.course_title;
    this.level=this.course.course_level;
    this.category_id=this.course.category_id;



    this.fetchTags();

},
data:()=>({

title:"",
level:"",
query:"",
previewImage:null,
category_id:null,
category:"",
sub_category:"",
f_tags:[],


}),
methods:{
    fetchTags(){
            axios.get('fetch-tags').then((res)=>{

                let data=res.data.tags;
                    let f_tags=[];
                data.forEach(element => {

                    f_tags.push(element.name);
                });
                this.fetchedTags=f_tags;

            }).catch()
        },
    fetchCategories(){
        axios.get(`/category/${this.category_id}`).then((res)=>{
            console.log(res);
        }).catch((err)=>{console.log(err);})
    }

}

}
</script>

<style>

</style>
