<template>

    <div>
        <div class="container">

            <h2 class="text-danger text-center pt-4">

               <div class="bg-dark">{{deleteMessege}}</div>

            </h2>

            <div class="row">
                <div class="col-md-12">
                    <h4>View Customer List</h4><br>
                    <table class="table table-reflow">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Customer Address</th>
                            <th>Create Time </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="customer in customers">
                            <th scope="row">{{customer.id}}</th>
                            <td>{{customer.customer_name}}</td>
                            <td>{{customer.customer_email}}</td>
                            <td>{{customer.customer_phone}}</td>
                            <td>{{customer.customer_address}}</td>
                            <td>{{customer.created_at}}</td>

                            <td class="d-flex justify-content-center align-items-center">

                                <router-link :to="{name:'editCustomer',params:{id:customer.id}}" class="pr-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                </router-link>

                                <a @click.prevent="deleteCustomer(customer.id)">
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
        name: "viewCustomer",
        data(){

            return{
                deleteMessege:'',
            customers:[]
            }
        },
        created(){

          this.showCustomer()
        },
        methods:{

            deleteCustomer(id){
                axios.delete('customer/'+id,{

                }).then(response=>{

                    this.deleteMessege=response.data.message
                        this.showCustomer()
                })

            },
            showCustomer(){
                axios.get('customer').then(response=>{

                    this.customers=response.data.customers
                })

            }

        }
    }
</script>

<style scoped>

</style>