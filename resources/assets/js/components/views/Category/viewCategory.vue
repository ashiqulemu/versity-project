<template>


        <div>
            <div class="container">

                <h2 class="text-danger text-center pt-4">

                    {{deleteMessege}}

                </h2>

                <div class="row">
                    <div class="col-md-12">
                        <h4>View Category List</h4><br>
                        <table class="table table-reflow">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Create Time </th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in categories">
                                <th scope="row">{{category.id}}</th>
                                <td>{{category.category_name}}</td>
                                <td>{{category.category_desc}}</td>
                                <td>{{category.created_at}}</td>

                                <td class="d-flex justify-content-center align-items-center">

                                    <router-link :to="{name:'editCategory',params:{id:category.id}}" class="pr-2">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                    </router-link>

                                    <a @click.prevent="deleteCategory(category.id)">
                                        <i class="fa fa-trash-o" aria-hidden="true"> </i>
                                    </a>

                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </template>





<script>
    export default {
        name: "viewCategory",
        data(){
            return {

                deleteMessege:'',
                categories:[],
            }

        },
        created(){

            this.showCategory();
        },
        methods:{


            showCategory(){



                axios.get('category').then(response=>{


                    this.categories = response.data.category

                })
            },
            deleteCategory(id){
                axios.delete('category/'+id).then(response=>{

                    this.deleteMessege=response.data.message,
                        this.showCategory()
                })


            }


        }

    }
</script>

<style scoped>

</style>