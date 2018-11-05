<template>
    <div>
        <div class="container">
            <h2 class="text-danger text-center pt-4 align-content-center">

                <div class="bg-dark">{{deleteMessege}}</div>

            </h2>
            <div class="row">

                <div class="col-md-12">
                    <h4>View Product List</h4><br>
                    <table class="table table-reflow">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Category_id</th>
                            <th>Brand_id</th>
                            <th>Product Name</th>
                            <th>Product_code</th>
                            <th>Product_Desc</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr v-for="product in products">

                            <th scope="row">{{product.id}}</th>
                            <td>{{product.category_id}}</td>
                            <td>{{product.brand_id}}</td>
                            <td>{{product.product_name}}</td>
                            <td>{{product.product_code}}</td>
                            <td>{{product.product_desc}}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <router-link :to="{name:'editProduct',params:{id:product.id}}" class="pr-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </router-link>
                                <a @click.prevent="deleteProduct(product.id)">
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
                products:[]

            }




            },
        created(){

           this.showproduct()

        },

        methods:{


            deleteProduct(id){

                axios.delete('product/'+id)

                    .then(response=>{

                        this.deleteMessege=response.data.deletemessage,
                        this.showproduct()
                    })

            },



            showproduct(){

                axios.get('product').then(response=>{


                    this.products=response.data.product

                })


            }
        }
    }
</script>

<style scoped>

</style>