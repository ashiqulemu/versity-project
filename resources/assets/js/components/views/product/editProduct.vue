<template>
    <div>

        <div class="container">
            <form @submit.prevent="editProduct()">
                <h2 class="text-danger text-center pt-4">

                    <div class="bg-dark">{{updateMessage}}</div>

                </h2>
                <div class="row">
                    <div class="headerTtile">
                        Add Product
                    </div>
                </div>
                <div class="row shadow p-4 bg-default  ">
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label class="">Product Name </label>
                            <input type="text" class="form-control" v-model= "product_name" placeholder="product name ">

                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label   class="">Product Code </label>
                            <input type="text" class="form-control"  v-model= "product_code" placeholder="product Code ">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="">Select Brand </label>
                            <select  class="form-control" v-model="brand_id">
                                <option  value="">Select Brand</option>
                                <option    >{{brand_id}}</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="">Description </label>
                            <textarea name="" id="" cols="5" rows="2" v-model= "product_desct" class="form-control"></textarea>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="">Select Category </label>

                            <select  class="form-control" v-model="category_id">
                                <option  value="">Select category</option>
                                <option   >{{category_id}}</option>

                            </select>
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
        name: "editProduct",
        data(){

            return{
                product_name:'',
                product_code:'',
                brand_id:'',
                product_desct:'',
                category_id:'',
                updateMessage:'',



            }
        },
        created(){

          axios.get('product/'+this.$route.params.id+'/edit')
              .then(response=>{

                  this.product_name=response.data.editProduct.product_name
                  this.product_code=response.data.editProduct.product_code
                  this.brand_id=response.data.editProduct.brand_id
                  this.product_desct=response.data.editProduct.product_desc
                  this.category_id=response.data.editProduct. category_id

              })

        },

        methods:{

            editProduct(){
                    axios.patch('product/'+this.$route.params.id,{

                        product_name:this.product_name,
                        product_code:this.product_code,
                        product_desc:this.product_desc
                    }).then(response=>{

                        this.updateMessage=response.data.updateMessage
                    })



            }

        }
    }
</script>

<style scoped>

</style>