<template>
    <div>

        <div class="container">



            <form  @submit.prevent="updateSupplier()">

                <h2 class="text-success text-center pt-4">

                    <div class="bg-dark">{{supplierMessege}}</div>

                </h2>



                <div class="row">
                    <div class="headerTtile">
                        Update Supplier
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
                            <label class=" ">Supplier email </label>
                            <input type="text" class="form-control" v-model= "supplier_email"   placeholder="Supplier E-mail..... ">

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
                            <button type="submit" class="ml-3 btn btn-dark">Update</button>
                        </div>
                    </div>

                </div>

            </form>



        </div>



    </div>
</template>

<script>
    export default {
        name: "editSupplier",

        data(){

            return{
                supplier_name:'',
                supplier_email:'',
                supplier_phone:'',
                supplier_address:'',
                supplierMessege:''
            }


        },
        created(){
            axios.get('supplier/'+ this.$route.params.id+'/edit')

                .then(response=>{
                    this.supplier_name=response.data.editsupplier.supplier_name
                    this.supplier_email=response.data.editsupplier.supplier_email
                    this. supplier_phone=response.data.editsupplier. supplier_phone
                    this.supplier_address=response.data.editsupplier.supplier_address
                })



        },
        methods:{

            updateSupplier(){

                axios.patch('/supplier/'+this.$route.params.id,{

                    supplier_name:this.supplier_name,
                    supplier_email:this.supplier_email,
                    supplier_phone:this.supplier_phone,
                    supplier_address:this.supplier_address

                }).then(response=>{


                    this.supplierMessege=response.data.message

                })
            }

        }
    }
</script>

<style scoped>

</style>