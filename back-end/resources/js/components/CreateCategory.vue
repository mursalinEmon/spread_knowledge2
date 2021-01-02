<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create New Category</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" v-model="categoryName" placeholder="Category Name" required>
                            </div>

                            <div class="form-group">
                                <label for="categoryDescription">Category Description</label>
                                <textarea v-model="categoryDescription" type="text" class="form-control" id="categoryDescription" rows="3" placeholder="Put Description.." required></textarea>

                            </div>

                            <button @click.prevent="createCategory" class="btn btn-primary">Add Category</button>
                            <br>
                            <br>
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
</template>

<script>
export default {
    props:{
        categories:"",

    },
    data: ()=>({
        categoryName:"",
        categoryDescription:""
    }),

    methods: {
        createCategory(){
            axios.post('/category-create',{
                categoryName:this.categoryName,
                categoryDescription:this.categoryDescription,
            }).then((res)=>{
                console.log(res);
                this.categoryDescription="";
                this.categoryName="";

                this.$alert(
                res.data.message,
                "",
                "success"
                )
            }).catch()
        },
    },
}
</script>

<style>

</style>
