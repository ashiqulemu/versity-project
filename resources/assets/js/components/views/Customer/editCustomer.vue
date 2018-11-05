<template>
    <div>

        <div class="container">



            <form  @submit.prevent="updateCustomer()">

                <h2 class="text-danger text-center pt-4">

                    <div class="bg-dark">{{customerMessege}}</div>

                </h2>



                <div class="row">
                    <div class="headerTtile">
                       Update Customer
                    </div>
                </div>
                <div class="row shadow p-4 bg-default  ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Customer Name </label>
                            <input type="text" class="form-control" v-model= "customer_name"   placeholder="Customer name..... ">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">E-mail </label>
                            <input type="text" class="form-control" v-model= "customer_email"   placeholder="E-mail..... ">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Customer Phone </label>
                            <input type="text" class="form-control" v-model= "customer_phone"   placeholder="Phone Number..... ">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Customer Address </label>
                            <input type="text" class="form-control" v-model= "customer_address"   placeholder="Customer Address..... ">

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
        name: "editCustomer",

        data(){

            return {

                customer_name:'',
                customer_email:'',
                customer_phone:'',
                customer_address:'',
                customerMessege:''
            }

        },
        created(){
            axios.get('customer/'+this.$route.params.id+'/edit',{

            }).then(response=>{

                this.customer_name = response.data.editcustomers.customer_name,
                this.customer_email = response.data.editcustomers.customer_email,
                this.customer_phone = response.data.editcustomers.customer_phone,
                this.customer_address = response.data.editcustomers.customer_address





            })

        },
        methods:{


            updateCustomer(){

                axios.put('/customer/'+this.$route.params.id,{
                    customer_name:this.customer_name,
                    customer_email:this.customer_email,
                    customer_phone:this.customer_phone,
                    customer_address:this.customer_address,

                }).then(response=>{

                    this.customerMessege = response.data.message

                })

            }

        }
    }
</script>

<style scoped>

</style>