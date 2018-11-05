<template>
    <div>

       <div class="container">
           <form @submit.prevent="addProduct()">
               <h2 class="text-danger text-center pt-4">

                   <div class="bg-dark">{{prodctMessege}}</div>

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
                                <option  v-for="brand in brands" :value="brand.id" >{{brand.brand_name}}</option>

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
                                <option  v-for="category in categories"   :value="category.id" >{{category.category_name}}</option>

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
        name: "addProduct",
        data(){

            return{
                product_name:'',
                product_code:'',
                brand_id:'',
                product_desct:'',
                category_id:'',
                prodctMessege:'',

                categories:[],
                brands:[]

            }
        },
        created(){
            this.categoryselect();
            this. brandselect();

        },
        methods:{

            categoryselect(){


                axios.get('category').then(response=>{


                    this.categories=response.data.category
                })
            },

            brandselect(){

                axios.get('brand').then(response=>{


                    this.brands=response.data.brandShow
                })


            },

            addProduct(){

                axios.post('product',{


                    category_id:this.category_id,
                    brand_id:this.brand_id,
                    product_name:this.product_name,
                    product_code:this.product_code,
                    product_desc:this.product_desct,



                }).then(response=>{


                    this.prodctMessege=response.data.prodctMessege
                    this.product_name='',
                        this.product_code='',
                        this.brand_id='',
                        this.product_desct='',
                        this.category_id=''


                })




            }
            }




    }
</script>

<style scoped>

</style>