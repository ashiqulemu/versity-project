<template>
    <div>

        <div class="container">



            <form  @submit.prevent="addSupplier()">

                <h2 class="text-success text-center pt-4">

                    <div class="bg-dark">{{supplierMessage}}</div>

                </h2>



                <div class="row">
                    <div class="headerTtile">
                        Add Supplier
                    </div>
                </div>
                <div class="row shadow p-4 bg-default  ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Supplier Name </label>
                            <input type="text" class="form-control" v-model= "supplier_name"   placeholder="Supplier name..... ">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Supplier E-mail </label>
                            <input type="text" class="form-control" v-model= "supplier_email"   placeholder=" Supplier E-mail..... ">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Supplier Phone </label>
                            <input type="text" class="form-control" v-model= "supplier_phone"   placeholder="Supplier Phone ..... ">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Supplier Address </label>
                            <input type="text" class="form-control" v-model= "supplier_address"   placeholder="Supplier Address..... ">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" "></label>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" "></label>


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
        name: "addSupplier",

        data(){
            return{

                supplier_name:'',
                supplier_email:'',
                supplier_phone:'',
                supplier_address:'',

                supplierMessage:''


            }

        },

        methods:{

            addSupplier(){
                axios.post('supplier',{

                    supplier_name:this.supplier_name,
                    supplier_email:this.supplier_email,
                    supplier_phone:this.supplier_phone,
                    supplier_address:this.supplier_address
                }).then(response=>{
                    this.supplier_name='',
                        this.supplier_email='',
                        this.supplier_phone='',
                        this.supplier_address='',
                    this.supplierMessage=response.data.message
                })


            }


        }
    }
</script>

<style scoped>

</style>