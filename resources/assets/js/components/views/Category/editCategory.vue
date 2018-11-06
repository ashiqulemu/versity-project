<template>

    <div>

        <div class="container">
            <form @submit.prevent="updateCategory()">

                <div class="text-success p-3"> {{updateMessage}}</div>


                <div class="row">
                    <div class="headerTtile">
                        Update Category
                    </div>
                </div>
                <div class="row shadow p-4 bg-default  ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" ">Category Name </label>
                            <input type="text" class="form-control" v-model="category_name"
                                   placeholder="Category name..... ">

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label class=" "> Description </label>
                            <textarea name="" id="" cols="5" rows="2" v-model="category_desc"
                                      class="form-control"></textarea>

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
    import axios from 'axios'

    export default {
        name: "editCategory",
        data() {

            return {
                category_name: '',
                category_desc: '',

                updateMessage: ''
            }
        },
        created() {
            axios.get('category/' + this.$route.params.id + '/edit', {}).then(response => {


                this.category_name = response.data.editCategory.category_name,
                    this.category_desc = response.data.editCategory.category_desc


            })

        },
        methods: {

            updateCategory() {
                axios.patch('/category/' + this.$route.params.id, {
                    category_name: this.category_name,
                    category_desc: this.category_desc,

                }).then(response => {

                    this.updateMessage = response.data.updateMessage
                })

            }


        }
    }
</script>

<style scoped>

</style>