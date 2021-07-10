<template>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card px-3">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Edit Todo</h2>
                            <div class="add-items "> 
                                <form @submit.prevent="updateItem">
                                    <div class="input-group mb-3">
                                        <input type="hidden" class="form-control" v-model="todo.complete" >
                                        <input type="text" class="form-control" v-model="todo.desc"  placeholder="Edit item" aria-label="Edit item" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="submit" id="button-addon2">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                todo: {}
            }
        },
        created() {
            let loader = this.$loading.show();
            this.axios
                .get(`http://localhost:8000/api/todos/${this.$route.params.id}`)
                .then((res) => {
                    loader.hide();
                    this.todo = res.data;
                })
                .catch(err => {loader.hide(), this.$swal('Something went wrong')});
        },
        methods: {
            updateItem() {
                let loader = this.$loading.show();
                this.axios
                    .patch(`http://localhost:8000/api/todos/${this.$route.params.id}`, this.todo)
                    .then((res) => {
                        loader.hide();
                        this.$swal(response.data);
                        this.$router.push({ name: 'home' });
                    })
                    .catch(err => {loader.hide(), this.$swal('Something went wrong')});
            }
        }
    }
</script>