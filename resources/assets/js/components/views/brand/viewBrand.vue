<template>
    <div>
        <div class="container">

            <h2 class="text-danger text-center pt-4">

                {{deleteMessege}}

            </h2>

            <div class="row">
                <div class="col-md-12">
                    <h4>View Brand List</h4><br>
                    <table class="table table-reflow">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Create Time </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="brand in brands">
                            <th scope="row">{{brand.id}}</th>
                            <td>{{brand.brand_name}}</td>
                            <td>{{brand.brand_desc}}</td>
                            <td>{{brand.created_at}}</td>

                            <td class="d-flex justify-content-center align-items-center">

                                <router-link :to="{name:'editBrand',params:{id:brand.id}}" class="pr-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </router-link>

                                <a @click.prevent="deleteBrand(brand.id)">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
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
        name: "viewProduct",

        data(){

            return{

                deleteMessege:'',
                brands:[],

            }
        },

        created(){

           this.brand();

        },

        methods:{

            deleteBrand(id){

                axios.delete('brand/'+id).then(response=>{

                        this.deleteMessege = response.data.deleteMessege,
                        this.brand()

                })

            },

            brand(){

                axios.get('brand').then(response=>{

                    this.brands = response.data.brandShow

                })

            }

        }



    }
</script>

<style scoped>

</style>