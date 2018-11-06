<template>

    <div>
        <div class="container">
         <form  @submit.prevent="addCategory()">
        <h2 class="text-success"> {{categoryMessege}}</h2>
         <div class="row">
                    <div class="headerTtile">
                        Add Category
                    </div>
                </div>
                <div class="row shadow p-4 bg-default  ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Category Name </label>
                            <input type="text" class="form-control" v-model= "category_name" @keyup="checkCategoryName"  placeholder="Category name..... ">
                            <span class="text-danger">{{errorMessage}}</span>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label class=" "> Description </label>
                            <textarea name="" id="" cols="5" rows="2" v-model="category_desc" class="form-control"></textarea>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="ml-3 btn btn-dark">Submit</button>
                        </div>
                    </div>

                </div>

            </form>



        </div>



    </div>


</template>




<script>

    export default {
        name: "addCategory",
        data(){

            return{

                category_name:'',
                category_desc:'',
                categoryMessege:'',
                errorMessage:''

            }


        },
        methods:{

            addCategory(){

                axios.post('category',{

                    category_name:this.category_name,
                    category_desc:this.category_desc,

                }).then(response=>{
                        this.category_name='',
                        this.category_desc='',
                    this.categoryMessege=response.data.message

                })

            },
            checkCategoryName(){
               var name= this.category_name
                if(name.length<3){
                   this.errorMessage='Please input more than 3 char.'
                }else{
                   this.errorMessage=''
                }
            }




        }
    }

</script>

<style scoped>

</style>
