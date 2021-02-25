<template>
  <div class="container">
      <div v-for="(question,ind) in questions" :key="ind" class="row">
          <div class="card">
              <div class="card-header">
                  {{ question.question_body }}
              </div>
              <div class="card-body">
                  <div class="card-text"  v-for="(option,index) in (question.options.split(','))" :key="index">
                    <input  type="radio" :id="index" :value="option" v-model="picked[ind]">
                    <label > {{option}}</label>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    props:{
        questions:Array,
        default:[]
    },
    data:()=>({
          picked:[],
          pick:"",
      }),
    mounted(){
    //    this.fill_arr();
    },
    methods:{
        fill_arr(){
             let len = this.questions.length;
            for(let i=0;i<len;i++){
                console.log(i);
                picked[i]="";
            }
        }
    }

}
</script>

<style>

</style>
