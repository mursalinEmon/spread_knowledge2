<template>
  <div>
     <form  @submit.prevent="submitFile">
        <div class="form-group">
            <label for="">Describe Your Answer In Details</label>
            <vue-editor v-model="body" />
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
        <div>
            <button class="text-center btn btn-success form-group form-control" type="submit">Submit</button>
        </div>
     </form>
  </div>
</template>

<script>
export default {
    props:{
        question:{
            type:Object,
            deafult:null
        }
    },
     created(){
        this.fetchTags();
    },
data:()=>{
    return{
        body:"",
        fetchedTags:[],
        query:"",
        tags:[],
    }
},
methods:{

submitFile(){
    let formData = new FormData();

    formData.append('body',this.body);
    formData.append('tags',JSON.stringify(this.tags));
    axios.post(`/answer-to-question/${this.question.id}`,formData).then((res)=>{
        this.$alert(
              res.data.message,
              "",
              "success"
            );
            this.tags=[];
            this.question="";
            this.body="";
            this.topic="";
            this.query="";
    }).catch((err)=>{console.log(err);})

},
fetchTags(){
           axios.get('/fetch-tags').then((res)=>{

              let data=res.data.tags;
                let f_tags=[];
              data.forEach(element => {

                  f_tags.push(element.name);
              });
              this.fetchedTags=f_tags;

          }).catch()
      },
        addTags(){
          this.tags.push(this.query);
          this.query="";
      },

      deleteBadge(index){
          this.tags.splice(index,1);
      },

}

}
</script>

<style>

</style>
