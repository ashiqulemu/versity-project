<template>
    <div>

       <div class="container">



           <form  @submit.prevent="addBrand()">


               <h2 class="text-success"> {{brandMessege}}</h2>


                <div class="row">
                    <div class="headerTtile">
                        Add Brand
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



    </div>
</template>

<script>
    export default {
        name: "addProduct",

        data(){

            return{

                brand_name:'',
                brand_desc:'',
                brandMessege:'',

            }

        },
        methods:{

            addBrand(){

                axios.post('/brand',{

                    brand_name:this.brand_name,
                    brand_desc:this.brand_desc,

                }).then(response=>{

                    this.brand_name='',
                    this.brand_desc='',

                this.brandMessege =  response.data.brandMessege

                }).catch()
            }

        }



    }
</script>

<style scoped>

</style>