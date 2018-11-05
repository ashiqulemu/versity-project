<template>
    <div class="container">

<h2 class="text-success">{{updateMessege}}</h2>

        <form  @submit.prevent="updateBrand()">


            <h2 class="text-success">  </h2>


            <div class="row">
                <div class="headerTtile">
                    Update Brand
                </div>
            </div>
            <div class="row shadow p-4 bg-default  ">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class=" ">Brand Name </label>
                        <input type="text" class="form-control" v-model="brand_name"   placeholder="Brand name..... ">

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label class=" "> Description </label>
                        <textarea name="" id="" cols="5" rows="2" v-model="brand_desc" class="form-control"></textarea>

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
</template>

<script>

    import axios from 'axios'

    export default {
        name: "editProduct",

        data(){
            return{

                brand_name:'',
                brand_desc:'',
                updateMessege:''
            }

        },



        created(){

                axios.get('/brand/'+ this.$route.params.id + ' /edit').then(response=>{

                    this.brand_name =  response.data.pullBrand.brand_name,
                        this.brand_desc =  response.data.pullBrand.brand_desc


                })

        },

        methods:{

            updateBrand(){

                axios.patch('/brand/'+ this.$route.params.id,{


                    brand_name:this.brand_name,
                    brand_desc:this.brand_desc,

                }).then(response=>{

                    this.updateMessege = response.data.updateMessege

                })

            }


        },



    }
</script>

<style scoped>

</style>