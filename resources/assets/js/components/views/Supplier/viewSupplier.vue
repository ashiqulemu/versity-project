<template>

    <div>
        <div class="container">

            <h2 class="text-danger text-center pt-4">

                <div class="bg-dark">{{deleteMessege}}</div>

            </h2>

            <div class="row">
                <div class="col-md-12">
                    <h4>View Supplier List</h4><br>
                    <table class="table table-reflow">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier Name</th>
                            <th>Supplier Email</th>
                            <th>Supplier Phone</th>
                            <th>Supplier Address</th>
                            <th>Create Time </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="supplier in suppliers">
                            <th scope="row">{{supplier.id}}</th>
                            <td>{{supplier.supplier_name}}</td>
                            <td>{{supplier.supplier_email}}</td>
                            <td>{{supplier.supplier_phone}}</td>
                            <td>{{supplier.supplier_address}}</td>
                            <td>{{supplier.created_at}}</td>

                            <td class="d-flex justify-content-center align-items-center">

                                <router-link :to="{name:'editSupplier',params:{id:supplier.id}}" class="pr-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                </router-link>

                                <a @click.prevent="deleteSupplier(supplier.id)">
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
        name: "viewSupplier",
        data(){

            return{
                deleteMessege:'',
                suppliers:[]

            }
        },
        created(){

            this.showSupplier()
        },


        methods:{

            deleteSupplier(id){

                axios.delete('supplier/'+id).then(response=>{

                    this.deleteMessege=response.data.message
                    this.showSupplier()

                })


            },
            showSupplier(){

                axios.get('supplier').then(response=>{

                    this.suppliers=response.data.suppliers

                })
            }
        }
    }
</script>

<style scoped>

</style>